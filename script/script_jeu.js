

function redirect(game) {

  if (game == "Sword Battle") {

    var config = {
      type: Phaser.AUTO,
      width: 900,
      height: 600,
      physics: {
        default: 'arcade',
        arcade: {
          gravity: { y: 450 },

        }
      },
      scene: {
        preload: preload,
        create: create,
        update: update,
        keyJustDown: keyJustDown

      }
    }

    var game = new Phaser.Game(config);

    let personnage;
    let personnage2;
    let cursors;
    let platforms;
    var score = 0;
    var scoreText;
    var keysDown = {};

    var fleches;
    var spacebar;



    function preload() {
      this.load.image('skin', 'images/skin.png');
      this.load.image('ciel', 'images/sky.png');
      this.load.image('sol', 'images/platform.png');
      this.load.image('fleche', 'images/fleche.png');
      this.load.atlas('steve','images/steve_mine_spritesheet.png','images/minestevesprites.json');
    }


    function create() {
      ciel = this.add.image(0,0, 'ciel');
      ciel.setScale(5)
      cursors = this.input.keyboard.createCursorKeys();
     personnage2 = this.physics.add.sprite(800, 0, 'steve');
      personnage = this.physics.add.sprite(0,0,'steve');
      var tabfleches=[]
      for(let i=0;i<10;i++){
        tabfleches[i]=this.physics.add.sprite(personnage.x, personnage2.y, 'fleche').setScale(1);
        tabfleches[i].disableBody(true, true); 
      }   
      platforms = this.physics.add.staticGroup();
      platforms.create(400, 568, 'sol').setScale(2).refreshBody();
      platforms.create(1400, 568, 'sol').setScale(2).refreshBody();
      platforms.create(200, 450, 'sol');
      platforms.create(500, 320, 'sol');
      platforms.create(1000, 320, 'sol');
      platforms.create(1600, 450, 'sol');
      this.physics.add.collider(personnage, platforms);
      this.physics.add.collider(personnage2, platforms);
      this.physics.add.collider(personnage2, personnage);
      personnage.body.collideWorldBounds = true
      personnage2.body.collideWorldBounds = true
      personnage.setScale(1.5)
      personnage2.setScale(1.5)
      personnage.body.setBounce(0.2)
      personnage2.body.setBounce(0.2)
      this.anims.create({key:'stance',frames:this.anims.generateFrameNames('steve' , {prefix:'stance',end:10 ,zeroPad:4}), repeat:-1});
      this.anims.create({key:'run',frames: this.anims.generateFrameNames('steve',{prefix:'run',end:20,zeroPad:4}),repeat:-1});
      this.anims.create({key:'shield',frames: this.anims.generateFrameNames('steve',{prefix:'shield',end:7,zeroPad:4}),repeat:0});
      this.anims.create({key:'frape',frames: this.anims.generateFrameNames('steve',{prefix:'frape',end:3,zeroPad:4}),repeat:0});
      this.anims.create({key:'saut',frames: this.anims.generateFrameNames('steve',{prefix:'saut',end:4,zeroPad:4}),repeat:-1});
      this.anims.create({key:'tir',frames: this.anims.generateFrameNames('steve',{prefix:'tir',end:20,zeroPad:4}),repeat:-1});
      // scoreText1 = this.add.text(16, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
      // scoreText2 = this.add.text(730, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
      spacebar = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);
      touche_z = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.Z);
      touche_q = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.Q);
      touche_s = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.S);
      touche_d = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.D);

      var gfx = this.add.graphics().setDefaultStyles({ lineStyle: { width: 10, color: 0xffdd00, alpha: 0.5 } });
      var line = new Phaser.Geom.Line();
      var angle = 0;
      this.input.on('pointermove', function (pointer) {
        angle = Phaser.Math.Angle.BetweenPoints(personnage, pointer);
        Phaser.Geom.Line.SetToAngle(line, personnage.x, personnage.y, angle, 500);
        gfx.clear().strokeLineShape(line);
      }, this);

      var nbfleches=tabfleches.length;
      this.input.on('pointerup', function () {
        nbfleches--; let i=nbfleches;
        console.log(nbfleches);
        if(nbfleches>=0){
        tabfleches[i].enableBody(true, personnage.x, personnage.y, true, true);
      //  tabfleches[i].play('fly');
        this.physics.velocityFromRotation(angle, 800, tabfleches[i].body.velocity);
        this.physics.add.collider(tabfleches[i], platforms);
        this.physics.add.collider(tabfleches[i], personnage2);
        this.physics.add.collider(tabfleches[i], personnage);
      //tabfleches[i].body.collideWorldBounds = true;
        tabfleches[i].body.setBounce(0.5);
      } 
    }, this);
      this.physics.world.setBounds(0, 0, 2000, 600);
      this.cameras.main.setBounds(0, 0, 2000, 600);
      this.cameras.main.startFollow(personnage, false, 0.2, 0.2);

      this.data.set('touches 1', 'Fleches directionnelles,Clic-gauche,Espace');
      this.data.set('score1', 0);
      this.data.set('touches 2', 'ZQSD,Clic-gauche,Espace');
      this.data.set('score2', 0);

      var text = this.add.text(16, 16, '', { font: '15px Courier', fill: '#00ff00' });
      var text2 = this.add.text(16, 40, '', { font: '15px Courier', fill: '#00ff00' });

      text.setText([
        'Touches 1: ' + this.data.get('touches 1'),
        'Score 1: ' + this.data.get('score1'),
      ]);
      text2.setText([
        'Touches 2: ' + this.data.get('touches 2'),
        'Score 2: ' + this.data.get('score2'),
      ]);
    }


    function keyJustDown(key) {
      if (keysDown[key] === undefined) {
        keysDown[key] = true;
        return true;
      } else {
        return false;
      }
    }



    function update() {
/*

      if (spacebar.justDown)
      // if(Phaser.Input.Keyboard.justDown(spacebar))
      {
        console.log("pressed");
        var fleche = fleches.get();

        if (fleche) {
          fleche.fire(personnage.x, personnage.y);
        }

      }


      this.input.keyboard.on('keydown', function (event) {
        if (event.code === 'Space' && keyJustDown(event.code)) {
          console.log("pressed");
          var fleche = fleches.get();
          var fleche2 = fleches.get();

          if (fleche) {
            fleche.fire(personnage.x, personnage.y);
          }


        }

      });

      this.input.keyboard.on('keyup', function (event) {
        keysDown[event.code] = undefined;
      });

      this.input.keyboard.on('keyup', function (event) {
        keysDown[event.code] = undefined;
      });
      */


        //BLOC PERSO 1
       
      if (cursors.left.isDown) {
        personnage.setVelocityX(-200);
        personnage.flipX=true;
        if(personnage.body.touching.down){personnage.anims.play('run', true);}
        
      }
      else if (cursors.right.isDown) {
        personnage.setVelocityX(200);
        personnage.flipX=false;
        if(personnage.body.touching.down){ personnage.anims.play('run', true);}
      }
      else if (cursors.down.isDown) {
        personnage.setVelocityX(0);
        personnage.anims.play('shield');
      }else if (spacebar.isDown){
        personnage.setVelocityX(0);
     //   personnage.anims.play('frape',true);
      personnage.anims.play('tir',true);
      }
      else {
        personnage.setVelocityX(0);
        personnage.anims.play('stance',true);
        }
      if (cursors.up.isDown && personnage.body.touching.down) {
        personnage.setVelocityY(-350)
      }

      if(!personnage.body.touching.down && !cursors.down.isDown && !spacebar.isDown && personnage.body.velocity.y>=100 || personnage.body.velocity.y<=-50 )personnage.anims.play('saut',true);

      //BLOC PERSO 2
      if (touche_q.isDown) {
        personnage2.setVelocityX(-200);
        personnage2.flipX=true;
        if(personnage2.body.touching.down)personnage2.anims.play('run', true);
      }
      else if (touche_d.isDown) {
        personnage2.setVelocityX(200);
        personnage2.flipX=false;
      if(personnage2.body.touching.down)personnage2.anims.play('run', true);
      }
      else if (touche_s.isDown){
        personnage2.setVelocityX(0);
        personnage2.anims.play('shield');
      }else if (spacebar.isDown){
        personnage2.setVelocityX(0);
     //   personnage.anims.play('frape',true);
      personnage2.anims.play('tir',true);
      }else {
        personnage2.setVelocityX(0);
        personnage2.anims.play('stance',true);
      }
      if (touche_z.isDown && personnage2.body.touching.down) {personnage2.setVelocityY(-350)}
      
      if(!personnage2.body.touching.down && !touche_s.isDown && !spacebar.isDown && personnage2.body.velocity.y>=100 || personnage2.body.velocity.y<=-50  )personnage2.anims.play('saut',true);
      
      
      if (personnage.body.y > 504 && cursors.up.isDown) {
        personnage.setVelocityY(-350)
      }
      if (personnage2.body.y > 504 && touche_z.isDown) {
        personnage2.setVelocityY(-350)
      }

      
    }

    

  }
  


}









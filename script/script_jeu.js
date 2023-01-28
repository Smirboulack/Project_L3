

function redirect(game) {

  if (game == "CHATGPT") {

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
      //  this.load.image('crounch','images/crounch_left.png');
      this.load.spritesheet('sprite_sheet',
        'images/spritesheet2.png',
        { frameWidth: 165, frameHeight: 231 }
      );



    }


    function create() {



      cursors = this.input.keyboard.createCursorKeys();
      ciel = this.add.image(0, 0, 'ciel');
      ciel.setScale(5)
      personnage = this.physics.add.sprite(0, 0, 'sprite_sheet');
      personnage2 = this.physics.add.sprite(900, 0, 'sprite_sheet');
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
      personnage.setScale(0.4)
      personnage2.setScale(0.4)
      personnage.body.setBounce(0.2)
      personnage2.body.setBounce(0.2)

      //   scoreText1 = this.add.text(16, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
      //  scoreText2 = this.add.text(730, 16, 'score: 0', { fontSize: '32px', fill: '#000' });

      spacebar = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);
      touche_z = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.Z);
      touche_q = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.Q);
      touche_s = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.S);
      touche_d = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.D);


      this.anims.create({
        key: 'left',
        frames: this.anims.generateFrameNumbers('sprite_sheet', { start: 1, end: 3 }),
        frameRate: 10,
        repeat: -1
      });

      this.anims.create({
        key: 'turn_perso1',
        frames: [{ key: 'sprite_sheet', frame: 5 }],
        frameRate: 20
      });

      this.anims.create({
        key: 'turn_perso2',
        frames: [{ key: 'sprite_sheet', frame: 4 }],
        frameRate: 20
      });

      this.anims.create({
        key: 'right',
        frames: this.anims.generateFrameNumbers('sprite_sheet', { start: 5, end: 8 }),
        frameRate: 10,
        repeat: -1
      });




      this.physics.world.setBounds(0, 0, 2000, 600);
      this.cameras.main.setBounds(0, 0, 2000, 600);
      this.cameras.main.startFollow(personnage, false, 0.2, 0.2);

      this.data.set('lives', 3);
      this.data.set('level', 5);
      this.data.set('score', 2000);

      var text = this.add.text(16, 16, '', { font: '32px Courier', fill: '#00ff00' });

      text.setText([
        'Level: ' + this.data.get('level'),
        'Lives: ' + this.data.get('lives'),
        'Score: ' + this.data.get('score')
      ]);

      /*
      var Fleche = new Phaser.Class({

        Extends: Phaser.GameObjects.Image,

        initialize:

          function fleche(scene) {
            Phaser.GameObjects.Image.call(this, scene, 0, 0, 'fleche');
            this.speed = Phaser.Math.GetSpeed(600, 1);
            this.angle = Phaser.Math.Angle.Between(0, 0, scene.input.activePointer.x, scene.input.activePointer.y);
          },

        fire: function (x, y, angle) {
          this.setPosition(x, y);

          this.setActive(true);
          this.setVisible(true);
        },

        update: function (time, delta) {
          this.x += this.speed * delta;

          if (this.x > 2000) {
            this.setActive(false);
            this.setVisible(false);
          }
          if (this.x <= 0) {
            this.setActive(false);
            this.setVisible(false);
          }

        }

      });

      fleches = this.add.group({
        classType: Fleche,
        maxSize: 100,
        runChildUpdate: true
      });



      var gfx = this.add.graphics().setDefaultStyles({ lineStyle: { width: 10, color: 0xffdd00, alpha: 0.5 } });
      var line = new Phaser.Geom.Line();
      var angle = 0;

      this.input.on('pointermove', function (pointer) {
        angle = Phaser.Math.Angle.BetweenPoints(personnage, pointer);
        Phaser.Geom.Line.SetToAngle(line, personnage.x, personnage.y, angle, 128);
        gfx.clear().strokeLineShape(line);
      }, this);

      this.input.on('pointerup', function () {
        var fleche = fleches.get();
        if (fleche) {
          fleche.fire(personnage.x, personnage.y);
        }
      }, this);

      */

      var Fleche = new Phaser.Class({
        Extends: Phaser.GameObjects.Image,

        initialize:
    
          function fleche(scene) {
            Phaser.GameObjects.Image.call(this, scene, 0, 0, 'fleche');
            this.speed = Phaser.Math.GetSpeed(600, 1);
            this.angle = Phaser.Math.Angle.Between(0, 0, scene.input.activePointer.x, scene.input.activePointer.y);
          },
    
        fire: function (x, y, angle) {
          this.setPosition(x, y);
          this.angle = angle;  // set the angle of the fleche to the angle of the mouse pointer
          this.setActive(true);
          this.setVisible(true);
        },
    
        update: function (time, delta) {
          this.x += this.speed * delta * Math.cos(this.angle); // update x position based on angle
          this.y += this.speed * delta * Math.sin(this.angle); // update y position based on angle
    
          if (this.x > 2000) {
            this.setActive(false);
            this.setVisible(false);
          }
          if (this.x <= 0) {
            this.setActive(false);
            this.setVisible(false);
          }
    
        }
    
      });
    
      fleches = this.add.group({
        classType: Fleche,
        maxSize: 100,
        runChildUpdate: true

        
      });

      fleches.children.iterate(function (fleche) {
        this.physics.add.existing(fleche);
    });
    
    
    
      var gfx = this.add.graphics().setDefaultStyles({ lineStyle: { width: 10, color: 0xffdd00, alpha: 0.5 } });
      var line = new Phaser.Geom.Line();
      var angle = 0;
    
      this.input.on('pointermove', function (pointer) {
        angle = Phaser.Math.Angle.BetweenPoints(personnage, pointer);
        Phaser.Geom.Line.SetToAngle(line, personnage.x, personnage.y, angle, 128);
        gfx.clear().strokeLineShape(line);
      }, this);
    
      this.input.on('pointerup', function () {
        var fleche = fleches.get();
        this.physics.add.existing(fleche);
        this.physics.add.collider(fleches, platforms);
        this.physics.add.collider(fleches, personnage2);
        if (fleche) {
          fleche.fire(personnage.x, personnage.y, angle);  // pass the current angle to the fire method

        }
      }, this);
    


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



      if (cursors.left.isDown) {
        personnage.setVelocityX(-200);
        personnage.anims.play('left', true);
      }
      else if (cursors.right.isDown) {
        personnage.setVelocityX(200);
        personnage.anims.play('right', true);
      }
      else if (cursors.down.isDown) {
        personnage.setVelocityX(0);
        personnage.anims.play('down_left', true);
      }
      else {
        personnage.setVelocityX(0);
        if (personnage2.x > personnage.x) {
          personnage.anims.play('turn_perso1');
        } else {
          personnage.anims.play('turn_perso2');
        }

      }
      if (cursors.up.isDown && personnage.body.touching.down) {
        personnage.setVelocityY(-350)
      }

      if (touche_q.isDown) {
        personnage2.setVelocityX(-200);
        personnage2.anims.play('left', true);
      }
      else if (touche_d.isDown) {
        personnage2.setVelocityX(200);
        personnage2.anims.play('right', true);
      }
      else {
        personnage2.setVelocityX(0);
        if (personnage2.x > personnage.x) {
          personnage2.anims.play('turn_perso2');
        } else {
          personnage2.anims.play('turn_perso1');
        }
      }
      if (touche_z.isDown && personnage2.body.touching.down) {
        personnage2.setVelocityY(-350)
      }
      //  console.log(personnage.y);
      if (personnage.y > 552 && cursors.up.isDown) {
        personnage.setVelocityY(-350)
      }
      if (personnage2.y > 552 && touche_z.isDown) {
        personnage2.setVelocityY(-350)
      }


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

    }

  }
}









function etape_suivconnex() {
  if (window.confirm("Inscription réussis ! Passer à la connexion ?")) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?page=inscription?subscribe=oui', true);
    xhr.send();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        window.location.href = 'index.php?page=connexion';
      }
    }
  }
}

function temps_de_connexion() {
  var loginTime = new Date();
  setInterval(function () {
    var timeElapsed = (new Date() - loginTime) / 1000;
    var hours = Math.floor(timeElapsed / 3600);
    var minutes = Math.floor((timeElapsed % 3600) / 60);
    var seconds = Math.floor(timeElapsed % 60);
    document.getElementById("connex_ok").innerHTML = hours + "Heures:" + minutes + "Minutes:" + seconds + "secondes.";
  }, 1000);
}


let toggle = document.querySelector('.toggle');
let body = document.querySelector('body');

toggle.addEventListener('click', function () {
  body.classList.toggle('open');
})

if (window.location.href === "http://localhost/lifkiya/index.php?page=jeu" || window.location.href === "http://lif.sci-web.net/~lifkiya/lifkiya/index.php?page=jeu" ){
  const config = {
    width: 1800,
    height: 600,
    type: Phaser.AUTO,
    physics: {
      default: 'arcade',
      arcade: {
        gravity: { y: 450 },
  
      }
    },
    scene: {
      preload: preload,
      create: create,
      update: update
    }
  }
  
  var game = new Phaser.Game(config)
  let personnage
  let personnage2
  let cursors
  let platforms
  var score = 0;
  var scoreText;
  let action_en_lair = false;
  let derniere_pos
  let moveRightTimer;
  var spacebar;
  
  
  function preload() {
    this.load.image('skin', 'images/skin.png');
    this.load.image('ciel', 'images/sky.png');
    this.load.image('sol', 'images/platform.png');
    this.load.spritesheet('sprite_sheet', 
        'images/spritesheet.png',
        { frameWidth: 169.2, frameHeight: 238 }
    );
  }
  
  
  function create() {
  
    cursors = this.input.keyboard.createCursorKeys();
    ciel = this.add.image(0, 0, 'ciel');
    ciel.setScale(5)
   // personnage = this.physics.add.image(0, 0, 'skin');
   personnage = this.physics.add.sprite(0, 0, 'sprite_sheet');
   // personnage2 = this.physics.add.image(1800, 0, 'skin');
   personnage2 = this.physics.add.sprite(1800, 0, 'sprite_sheet');
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
    scoreText1 = this.add.text(16, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
    scoreText2 = this.add.text(1600, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
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
      frames: [ { key: 'sprite_sheet', frame: 5 } ],
      frameRate: 20
  });
  
  this.anims.create({
      key: 'right',
      frames: this.anims.generateFrameNumbers('sprite_sheet', { start: 5, end: 8 }),
      frameRate: 10,
      repeat: -1
  });


  this.anims.create({
      key: 'left',
      frames: this.anims.generateFrameNumbers('sprite_sheet', { start: 1, end: 3 }),
      frameRate: 10,
      repeat: -1
  });
  
  this.anims.create({
      key: 'turn_perso2',
      frames: [ { key: 'sprite_sheet', frame: 4 } ],
      frameRate: 20
  });
  
  this.anims.create({
      key: 'right',
      frames: this.anims.generateFrameNumbers('sprite_sheet', { start: 5, end: 8 }),
      frameRate: 10,
      repeat: -1
  });



  }
  
  
  /*
  function update() {
  
    if (!cursors.up.isDown && personnage.body.blocked.down) {
      personnage.setVelocityX(0)
    }
  
    if (cursors.up.isDown && personnage.body.blocked.down) {
      personnage.setVelocity(0, -300)
    }
  
    if (cursors.right.isDown && personnage.body.blocked.down) {
      personnage.setVelocity(200, 0)
    }
    if (cursors.left.isDown && personnage.body.blocked.down) {
      personnage.setVelocity(-200, 0)
    }
    if (cursors.down.isDown && personnage.body.blocked.down) {
      personnage.setVelocity(0, 200)
    }
    if (cursors.right.isDown && cursors.up.isDown && personnage.body.blocked.down) {
      personnage.setVelocity(200, -300)
  
    }
    if (cursors.left.isDown && cursors.up.isDown && personnage.body.blocked.down) {
      personnage.setVelocity(-200, -300)
    }
  
  
    if (personnage.y < derniere_pos-20) {
      if (!personnage.body.blocked.down ) {
        if(cursors.right.isDown && action_en_lair==false ){
          personnage.setVelocity(200,0)
          action_en_lair=true;
      }
      if(cursors.left.isDown  && action_en_lair==false){
        personnage.setVelocity(-200,0)
        action_en_lair=true;
      }
      }
    }
  
  
    if (personnage.body.blocked.down) {
      action_en_lair = false;
      derniere_pos = personnage.y
    }
    console.log(cursors.right.justDown)
  
  }
  */
  
  
  function update() {
  
    if (cursors.left.isDown) {
      personnage.setVelocityX(-200);
      personnage.anims.play('left', true);
    }
    else if (cursors.right.isDown) {
      personnage.setVelocityX(200);
      personnage.anims.play('right', true);
    }
    else {
      personnage.setVelocityX(0);
      if(personnage2.x>personnage.x){
        personnage.anims.play('turn_perso1');
      }else{
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
      if(personnage2.x>personnage.x){
        personnage2.anims.play('turn_perso2');
      }else{
        personnage2.anims.play('turn_perso1');
      }
    }
    if (touche_z.isDown && personnage2.body.touching.down) {
      personnage2.setVelocityY(-350)
    }
  
  }
  
}

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
  }
  
  
  function create() {
  
    cursors = this.input.keyboard.createCursorKeys();
    ciel = this.add.image(0, 0, 'ciel');
    ciel.setScale(5)
    personnage = this.physics.add.image(0, 0, 'skin');
    personnage2 = this.physics.add.image(1800, 0, 'skin');
    platforms = this.physics.add.staticGroup();
    platforms.create(400, 568, 'sol').setScale(2).refreshBody();
    platforms.create(1400, 568, 'sol').setScale(2).refreshBody();
    platforms.create(200, 450, 'sol');
    platforms.create(500, 320, 'sol');
    platforms.create(1000, 320, 'sol');
    platforms.create(1600, 450, 'sol');
    this.physics.add.collider(personnage, platforms);
    this.physics.add.collider(personnage2, platforms);
    personnage.body.collideWorldBounds = true
    personnage2.body.collideWorldBounds = true
    personnage.setScale(0.2)
    personnage2.setScale(0.2)
    personnage.body.setBounce(0.2)
    personnage2.body.setBounce(0.2)
    scoreText1 = this.add.text(16, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
    scoreText2 = this.add.text(1600, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
    spacebar = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);
    touche_z = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.Z);
    touche_q = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.Q);
    touche_s = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.S);
    touche_d = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.D);
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
    }
    else if (cursors.right.isDown) {
      personnage.setVelocityX(200);
    }
    else {
      personnage.setVelocityX(0);
    }
    if (cursors.up.isDown && personnage.body.touching.down) {
      personnage.setVelocityY(-350)
    }
  
    if (touche_q.isDown) {
      personnage2.setVelocityX(-200);
    }
    else if (touche_d.isDown) {
      personnage2.setVelocityX(200);
    }
    else {
      personnage2.setVelocityX(0);
    }
    if (touche_z.isDown && personnage2.body.touching.down) {
      personnage2.setVelocityY(-350)
    }
  
  }
  
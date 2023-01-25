const config = {
    width:800,
    height:600,
    type:Phaser.AUTO,
    physics:{
        default: 'arcade',
        arcade:{
            gravity: {y:450},
            
        }
    },
    scene:{
        preload: preload,
        create: create,
        update: update
    }
}

var game= new Phaser.Game(config)
let personnage
let cursors
let en_action=false;
let platforms
var score = 0;
var scoreText;
let action_en_lair=false;




function preload(){
    this.load.image('skin', 'images/skin.png');
    this.load.image('ciel', 'images/sky.png');
    this.load.image('sol', 'images/platform.png');
}


function create(){
    
    cursors = this.input.keyboard.createCursorKeys();
    ciel = this.add.image(0,0,'ciel');
    ciel.setScale(2)
    //platforms=this.add.image(750,220,'sol');
    personnage=this.physics.add.image(0,0, 'skin');
    
   platforms = this.physics.add.staticGroup();
    
    platforms.create(400, 568, 'sol').setScale(2).refreshBody();
     platforms.create(600, 400, 'sol');
    platforms.create(500, 250, 'sol');
   /* platforms.create(750, 220, 'sol');*/
    this.physics.add.collider(personnage, platforms);
    
    personnage.body.collideWorldBounds=true
    personnage.setScale(0.4)
    personnage.body.setBounce(0.2)
    

    scoreText = this.add.text(16, 16, 'score: 0', { fontSize: '32px', fill: '#000' });
    
}


function update(){
    
    
    if(!cursors.up.isDown && personnage.y>=454){
        personnage.setVelocityX(0)
        
    }
    
    /*
    if(cursors.up.isDown && personnage.y>=454){
       personnage.setVelocity(0,-300)
    }*/

    if(cursors.up.isDown && personnage.y>=454){
        personnage.setVelocity(0,-300)
     }

    if(cursors.right.isDown && personnage.y>=454){
        personnage.setVelocity(200,0)
     }
     if(cursors.left.isDown && personnage.y>=454){
        personnage.setVelocity(-200,0)
     }
     if(cursors.down.isDown && personnage.y>=454){
        personnage.setVelocity(0,200)
     }
     if(cursors.right.isDown && cursors.up.isDown && personnage.y>=454){
        personnage.setVelocity(200,-300)
        
     }
     if(cursors.left.isDown && cursors.up.isDown && personnage.y>=454){
        personnage.setVelocity(-200,-300)
     }
     
     if(personnage.y<=401){
        if(cursors.right.isDown && action_en_lair==false){
            personnage.setVelocity(200,0)
            action_en_lair=true;
        }
        if(cursors.left.isDown  && action_en_lair==false ){
            personnage.setVelocity(-200,0)
            action_en_lair=true;
            
        }
     }
    

     if(personnage.y>=454){action_en_lair=false;}
     if(personnage.y>400)console.log(personnage.y);
}


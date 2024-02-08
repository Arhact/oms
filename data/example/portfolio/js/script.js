/* use strict */

// фоновые анимации
function bg_particles(color){
    color = 'rgba('+color+', '
    let canvas = document.createElement('canvas'),
    ctx = canvas.getContext('2d'),
    w = canvas.width = innerWidth,
    h = canvas.height = innerHeight,
    particles = [],
    properties = {
        bgColor             : '#fff',
        particleColor       : color+1+')',
        particleRadius      : 3,
        particleCount       : 60,
        particleMaxVelocity : 0.5,
        lineLength          : 150,
        particleLife        : 6,
    };

    document.body.appendChild(canvas);

    window.onresize = function(){
        w = canvas.width = innerWidth,
        h = canvas.height = innerHeight;        
    }

    class Particle{
        constructor(){
            this.x = Math.random()*w;
            this.y = Math.random()*h;
            this.velocityX = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
            this.velocityY = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
            this.life = Math.random()*properties.particleLife*60;
        }
        position(){
            this.x + this.velocityX > w && this.velocityX > 0 || this.x + this.velocityX < 0 && this.velocityX < 0? this.velocityX*=-1 : this.velocityX;
            this.y + this.velocityY > h && this.velocityY > 0 || this.y + this.velocityY < 0 && this.velocityY < 0? this.velocityY*=-1 : this.velocityY;
            this.x += this.velocityX;
            this.y += this.velocityY;
        }
        reDraw(){
            ctx.beginPath();
            ctx.arc(this.x, this.y, properties.particleRadius, 0, Math.PI*2);
            ctx.closePath();
            ctx.fillStyle = properties.particleColor;
            ctx.fill();
        }
        reCalculateLife(){
            if(this.life < 1){
                this.x = Math.random()*w;
                this.y = Math.random()*h;
                this.velocityX = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                this.velocityY = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                this.life = Math.random()*properties.particleLife*60;
            }
            this.life--;
        }
    }

    function reDrawBackground(){
        ctx.fillStyle = properties.bgColor;
        ctx.fillRect(0, 0, w, h);
    }

    function drawLines(){
        let x1, y1, x2, y2, length, opacity;
        for(let i in particles){
            for(let j in particles){
                x1 = particles[i].x;
                y1 = particles[i].y;
                x2 = particles[j].x;
                y2 = particles[j].y;
                length = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
                if(length < properties.lineLength){
                    opacity = 1-length/properties.lineLength;
                    ctx.lineWidth = '0.5';
                    ctx.strokeStyle = color+opacity+')';
                    ctx.beginPath();
                    ctx.moveTo(x1, y1);
                    ctx.lineTo(x2, y2);
                    ctx.closePath();
                    ctx.stroke();
                }
            }
        }
    }

    function reDrawParticles(){
        for(let i in particles){
            particles[i].reCalculateLife();
            particles[i].position();
            particles[i].reDraw();
        }
    }

    function loop(){
        reDrawBackground();
        reDrawParticles();
        drawLines();
        requestAnimationFrame(loop);
    }

    function init(){
        for(let i = 0 ; i < properties.particleCount ; i++){
            particles.push(new Particle);
        }
        loop();
    }

    init();

}

function bg_hexagonalmotion(colorx) {

        const cnv  = document.querySelector('canvas');
        const ctx  = cnv.getContext('2d');
      
        let cw, ch, cx, cy;
        function resizeCanvas() {
          cw = cnv.width  = innerWidth ;
          ch = cnv.height = innerHeight;
          cx = cw / 2;
          cy = ch / 2;
        }
        resizeCanvas();
        window.addEventListener(`resize`, resizeCanvas);
      
        const cfg = {
          hue         : 0,
          bgFillColor : `rgba(255, 255, 255, .01)`,
          dirsCount   : 6,
          stepToTurn  : 16,
          dotSize     : 2,
          dotsCount   : 300,
          dotVelocity : 2,
          distance    : (1920 * 1080) / 2,
          gradientLen : 5,
        }
      
        function drawRect(color, x, y, w, h, shadowColor, shadowBlur, gco) {
          ctx.globalCompositeOperation = gco;
          ctx.shadowColor = shadowColor || `white`;
          ctx.shadowBlur  = shadowBlur  || 0.01;
          ctx.fillStyle   = color;
          ctx.fillRect(x, y, w, h);
        }
      
        class Dot {
          constructor() {
            this.pos     = {x: cx, y: cy};
            this.dir     = (Math.random() * 2 | 0) * 2;
            this.step    = 0;
          }
      
          redrawDot() {
            let xy       = Math.abs(this.pos.x - cx) + Math.abs(this.pos.y - cy);
            let makeHue  = (cfg.hue + xy / cfg.gradientLen ) % 360;
            let color    = `hsl(${ makeHue }, 100%, 50%)`;
            let blur     = cfg.dotSize - Math.sin(xy / 8) * 2;
            let size     = cfg.dotSize;// - Math.sin(xy / 9) * 2 + Math.sin(xy / 2);
            let x        = this.pos.x - size / 2;
            let y        = this.pos.y - size / 2;
      
            drawRect(color, x, y, size, size, color, blur, `heavier`);
          }
      
          moveDot() {
            this.step++;
            this.pos.x += dirsList[this.dir].x * cfg.dotVelocity;
            this.pos.y += dirsList[this.dir].y * cfg.dotVelocity;
          }
      
          changeDir() {
            if (this.step % cfg.stepToTurn === 0) {
              this.dir     = Math.random() > 0.5 ? (this.dir + 1) % cfg.dirsCount : (this.dir + cfg.dirsCount - 1) % cfg.dirsCount;
            }
          }
      
          killDot(id) {
            let percent = Math.random() * Math.exp(this.step / cfg.distance);
            if (percent > 100) {
              dotsList.splice(id, 1);
            }
          }
        }
      
        let dirsList = [];
        function createDirs() {
          for (let i = 0 ; i < 360 ; i+= 360 / cfg.dirsCount) {
            let x = Math.cos(i * Math.PI / 180);
            let y = Math.sin(i * Math.PI / 180);
            dirsList.push({x: x, y: y});
          }    
        }
        createDirs();
      
        let dotsList = [];
        function addDot() {
          if (dotsList.length < cfg.dotsCount && Math.random() > .8) {
            dotsList.push( new Dot() );
            cfg.hue = (cfg.hue + 1) % 360 ;
          }
        }
      
        function refreshDots() {
          dotsList.forEach( (i, id) => { 
            i.redrawDot();
            i.moveDot();
            i.changeDir();
            i.killDot(id)
          } );
        }
      function loop() {
          drawRect(cfg.bgFillColor, 0, 0, cw, ch, 0, 0, `normal`);
          addDot();
          refreshDots();
      
          requestAnimationFrame(loop);
        }
        loop();
      
};

function background(choose, color){
    let bg_massive = [bg_particles, bg_hexagonalmotion];
    bg_massive[Number(choose)-1](color);
}
// end фоновые анимации


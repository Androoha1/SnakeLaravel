

const blockSize = 30;
const rows = 20;
const cols = 20;

var snake;
var apple;

const colorSet1 = ['#006400' , '#90FF99'];

var score = 0;

var field = [
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
];
var board;
var context;

var directionQueue1 = [];
var directionQueue2 = [];

//speed 5-15 is ok
var speed = 4;


//Loading function
window.onload = function() {
    board = document.getElementById("board");
    board.height = rows * blockSize;
    board.width = cols * blockSize;
    context = board.getContext("2d");
    document.addEventListener("keyup", changeDirection);

    snake = new Snake(blockSize , 0 , colorSet1);
    apple = new Apple;

    setInterval(gameLoop , 1000/speed);
}

var gameOver = false;
function gameLoop() {
    if (gameOver) return;

    //draw board
    context.fillStyle = '#000000';
    context.fillRect(0 , 0 , board.width , board.height);

    //Draw
    apple.draw();
    snake.draw();

    //field matrix update before move
    if (snake.body.length) {
        field[snake.body[snake.body.length-1][1] / blockSize][snake.body[snake.body.length-1][0] / blockSize] = 0;
        field[snake.headY / blockSize][snake.headX / blockSize] = 1;
    }

    //check is apple eaten
    if (field[apple.y/blockSize][apple.x/blockSize]) { score++;
        snake.body.push([apple.x , apple.y]);
        field[snake.body[snake.body.length-1][1] / blockSize][snake.body[snake.body.length-1][0] / blockSize] = 1;
        while (field[apple.y/blockSize][apple.x/blockSize])
            apple.relocate();
        document.getElementById("score").textContent = score;
    }

    //Check all events
    if (directionQueue1.length > 0) {
        snake.changeDirection(directionQueue1.shift());
    }


    //Movement
    snake.move();


    //Check for game over
    if (field[snake.headY/blockSize][snake.headX/blockSize]) gameOver = true;
}

function changeDirection(e) {
    switch (e.key) {
        case 'w':
            directionQueue1.push([0,-1]);
            break;
        case 's':
            directionQueue1.push([0,1]);
            break;
        case 'a':
            directionQueue1.push([-1,0]);
            break;
        case 'd':
            directionQueue1.push([1,0]);
            break;

        case 'ArrowUp':
            directionQueue2.push([0,-1]);
            break;
        case 'ArrowDown':
            directionQueue2.push([0,1]);
            break;
        case 'ArrowLeft':
            directionQueue2.push([-1,0]);
            break;
        case 'ArrowRight':
            directionQueue2.push([1,0]);
            break;
    }
}
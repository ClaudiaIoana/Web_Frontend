const rows = 3;
const columns = 3;

let currTile;
let otherTile;

const imgOrder = ["1", "2", "3", "4", "5", "6", "7", "9", "8"];
//var imgOrder = ["4", "2", "8", "5", "1", "6", "7", "9", "3"];
let board = [];

window.onload = function (){
    for(let r = 0; r < rows; r++){
        for(let c= 0; c< columns; c++){
            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            let ci = imgOrder.shift();
            tile.src = "./pictures/" + ci + ".jpg";
            board.push(ci);

            tile.addEventListener("dragstart", dragStart);  //click an image to drag
            tile.addEventListener("dragover", dragOver);    //moving image around while clicked
            tile.addEventListener("dragenter", dragEnter);  //dragging image onto another one
            tile.addEventListener("dragleave", dragLeave);  //dragged image leaving anohter image
            tile.addEventListener("drop", dragDrop);        //drag an image over another image, drop the image
            tile.addEventListener("dragend", dragEnd);      //after drag drop, swap the two tiles

            document.getElementById("board").append(tile);
        }
    }

}

function dragStart() {
    currTile = this; //this refers to the img tile being dragged
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
}

function dragLeave() {

}

function dragDrop() {
    otherTile = this; //this refers to the img tile being dropped on
}

function dragEnd() {
    if (!otherTile.src.includes("9.jpg")) {
        return;
    }

    let currentPoz;
    if (currTile.src.includes("9.jpg"))
        currentPoz = 9;
    if (currTile.src.includes("8.jpg"))
        currentPoz = 8;
    if (currTile.src.includes("7.jpg"))
        currentPoz = 7;
    if (currTile.src.includes("6.jpg"))
        currentPoz = 6;
    if (currTile.src.includes("5.jpg"))
        currentPoz = 5;
    if (currTile.src.includes("4.jpg"))
        currentPoz = 4;
    if (currTile.src.includes("3.jpg"))
        currentPoz = 3;
    if (currTile.src.includes("2.jpg"))
        currentPoz = 2;
    if (currTile.src.includes("1.jpg"))
        currentPoz = 1;

    let otherPoz;
    if (otherTile.src.includes("9.jpg"))
        otherPoz = 9;
    if (otherTile.src.includes("8.jpg"))
        otherPoz = 8;
    if (otherTile.src.includes("7.jpg"))
        otherPoz = 7;
    if (otherTile.src.includes("6.jpg"))
        otherPoz = 6;
    if (otherTile.src.includes("5.jpg"))
        otherPoz = 5;
    if (otherTile.src.includes("4.jpg"))
        otherPoz = 4;
    if (otherTile.src.includes("3.jpg"))
        otherPoz = 3;
    if (otherTile.src.includes("2.jpg"))
        otherPoz = 2;
    if (otherTile.src.includes("1.jpg"))
        otherPoz = 1;


    let currCoords = currTile.id.split("-"); //ex) "0-0" -> ["0", "0"]
    let r = parseInt(currCoords[0]);
    let c = parseInt(currCoords[1]);

    let otherCoords = otherTile.id.split("-");
    let r2 = parseInt(otherCoords[0]);
    let c2 = parseInt(otherCoords[1]);

    let moveLeft = r == r2 && c2 == c-1;
    let moveRight = r == r2 && c2 == c+1;

    let moveUp = c == c2 && r2 == r-1;
    let moveDown = c == c2 && r2 == r+1;

    let isAdjacent = moveLeft || moveRight || moveUp || moveDown;

    if (isAdjacent) {
        let currImg = currTile.src;
        let otherImg = otherTile.src;

        for(let r = 0; r < rows*columns; r++) {
            let i = board.shift();
            if(i === currentPoz.toString()){
                board.push(otherPoz.toString());

            }
            else if(i === otherPoz.toString())
                board.push(currentPoz.toString());
            else
                board.push(i);
        }
        currTile.src = otherImg;
        otherTile.src = currImg;

        let b = board;

        let ok =1;
        for(let r = 1; r <= rows*columns; r++){
            if(b[r-1] !== r.toString()){
                ok = 0;
            }
        }

        if(ok === 1)
            document.getElementById("turns").innerText = "SOLVED. WELL DONE!";
        if(ok === 0)
            document.getElementById("turns").innerText = "UNSOLVED";
    }

}
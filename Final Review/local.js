class Rectangle{
    constructor(width,height){
        this.width = width;
        this.height = height;
    }
    area(){
        const areaFinal = this.width * this.height;
        return areaFinal;
    }
    perimeter(){
        const perimeterFinal = this.width * 2 + this.height * 2;
        return perimeterFinal;
    } 

}
let rectangleObject = new Rectangle(10,10);
document.write(rectangleObject.area());
document.write(rectangleObject.perimeter());
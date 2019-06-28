require('../scss/main.scss');


class Person{
    constructor(name){
        this.name = name ;
    }

    walk(){
        console.log(this.name + 'is walking');
    }
}
let bob = new Person('Bob');
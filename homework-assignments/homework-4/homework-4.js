import { cat as catObj, cats } from "./cats.js";

let question6 = () => {
  let result = cats
    .filter((cat) => cat.adoptionStatus == "available")
    .map((filteredCat) => filteredCat.name);
  return `My newly adopted cats are called ${result.join(", ")}`;
};

let question7 = () => {
  let ternaryVar =
    Math.random() * 10 > 5 ? "greater than five!" : "less than five!";
  return ternaryVar;
};

let question8 = () => {
  for (let property in catObj){
    console.log(`The value of the property ${property} is ${catObj[property]}`);
  }
};

let question9 = () => {
  if (1 == "1") {
    console.log("The comparison 1 == '1' returns true");
  }
  if (!(1 === "1")) {
    console.log("The comparison 1 === '1' returns false");
  }
};

let question10 = () => {
  let result = cats.map((cat) => `${cat.name} is cute!`);
  return result;
};

console.log(question6());
console.log(question7());
question8();
question9();
console.log(question10());

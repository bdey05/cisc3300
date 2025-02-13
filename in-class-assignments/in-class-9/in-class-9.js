let includesPinecone = (sentence) => sentence.includes("pinecone");

console.log(includesPinecone("This text includes pinecone"));
console.log(includesPinecone("This text includes something else."));

let getPinecone = (sentences) => sentences.filter(sentence => sentence.includes("pinecone"));

arr1 = ["This text includes pinecone", "This text includes something else.", 
        "The word pinecone has 8 letters", "pinecone at the beginning of the sentence!",
        "?Test string with random characters"]
        
console.log("The new array is:\n", getPinecone(arr1))
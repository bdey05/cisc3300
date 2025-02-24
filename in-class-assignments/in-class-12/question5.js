const parentVarString = "This is a parent var string";
const parentVarNum = 45; 

function useParentVar() {
    console.log("The following variables are from this function's parent context, which is the global context:");
    console.log(parentVarString);
    console.log(parentVarNum);
}

useParentVar();
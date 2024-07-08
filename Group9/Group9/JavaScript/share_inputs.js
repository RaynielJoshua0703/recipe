//ELEMENTS
var food = document.getElementById('food');
var cuisine = document.getElementById('cuisine');
var ingredients = document.getElementById('ingredients');
var instructions = document.getElementById('instructions');

function updateBackgroundColor(inputElement) {
    if (inputElement.value !== '') {
        inputElement.style.backgroundColor = 'white';
    } 
    else {
        inputElement.style.backgroundColor = 'rgba(255, 0, 0, .3)';
    }
}

function handleFocus(inputElement) {
    inputElement.style.backgroundColor = 'white';
}

function handleBlur(inputElement) {
    updateBackgroundColor(inputElement);
}

//INPUT
food.addEventListener('input', function() {
    updateBackgroundColor(food);
});
cuisine.addEventListener('input', function() {
    updateBackgroundColor(cuisine);
});
ingredients.addEventListener('input', function() {
    updateBackgroundColor(ingredients);
});
instructions.addEventListener('input', function() {
    updateBackgroundColor(instructions);
});

//FOCUS
food.addEventListener('focus', function() {
    handleFocus(food);
});
cuisine.addEventListener('focus', function() {
    handleFocus(cuisine);
});
ingredients.addEventListener('focus', function() {
    handleFocus(ingredients);
});
instructions.addEventListener('focus', function() {
    handleFocus(instructions);
});

//BLUR
food.addEventListener('blur', function() {
    handleBlur(food);
});
cuisine.addEventListener('blur', function() {
    handleBlur(cuisine);
});
ingredients.addEventListener('blur', function() {
    handleBlur(ingredients);
});
instructions.addEventListener('blur', function() {
    handleBlur(instructions);
});
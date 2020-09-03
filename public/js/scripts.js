var letter = document.getElementById('letter');

var letterString = letter.text.substr(0, 1);

letter.innerHTML = '<b>' + letterString.toUpperCase() + '</b>';
// name.innerHTML = 'jkfdsjf';

// console.log(letterString);

console.log(letter);
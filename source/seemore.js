// window.onload = function() {
//     var descriptions = document.getElementsByClassName('short-description');
//     for (var i = 0; i < descriptions.length; i++) {
//         var description = descriptions[i];
//         var seeMoreLink = description.getElementsByClassName('see-more-link')[0];
//         if (isOverflowing(description)) {
//             seeMoreLink.style.display = 'inline';
//         }
//     }

//     var seeMoreLinks = document.getElementsByClassName('see-more-link');
//     for (var i = 0; i < seeMoreLinks.length; i++) {
//         seeMoreLinks[i].addEventListener('click', function(e) {
//             e.preventDefault();
// function isOverflowing(element) {
//     return element.scrollHeight > element.clientHeight;
// }

// window.addEventListener('load', function() {
//     var descriptions = document.getElementsByClassName('short-description');
//     for (var i = 0; i < descriptions.length; i++) {
//         var description = descriptions[i];
//         var seeMoreLink = description.getElementsByClassName('see-more-link')[0];
//         if (isOverflowing(description)) {
//             seeMoreLink.style.display = 'inline';
//         }
//     }

//     var seeMoreLinks = document.getElementsByClassName('see-more-link');
//     for (var i = 0; i < seeMoreLinks.length; i++) {
//         seeMoreLinks[i].addEventListener('click', function(e) {
//             e.preventDefault();
//             this.parentNode.style.whiteSpace = 'normal';
//             this.style.display = 'none';
//         });
//     }
// });            this.parentNode.style.whiteSpace = 'normal';
//             this.style.display = 'none';
//         });
//     }
// };

// function isOverflowing(element) {
//     return element.scrollHeight > element.clientHeight;
// }

// function countLines(element) {
//     var style = window.getComputedStyle(element, null);
//     var lineHeight = parseInt(style.getPropertyValue('line-height'), 10);
//     var height = parseInt(style.getPropertyValue('height'), 10);
//     return Math.round(height / lineHeight);
// }

// window.addEventListener('load', function() {
//     var descriptions = document.getElementsByClassName('short-description');
//     for (var i = 0; i < descriptions.length; i++) {
//         var description = descriptions[i];
//         var seeMoreLink = description.getElementsByClassName('see-more-link')[0];
//         if (countLines(description) > 3) { // replace 3 with the maximum number of lines
//             seeMoreLink.style.display = 'inline';
//         }
//     }

//     var seeMoreLinks = document.getElementsByClassName('see-more-link');
//     for (var i = 0; i < seeMoreLinks.length; i++) {
//         seeMoreLinks[i].addEventListener('click', function(e) {
//             e.preventDefault();
//             this.parentNode.style.whiteSpace = 'normal';
//             this.style.display = 'none';
//         });
//     }
// });
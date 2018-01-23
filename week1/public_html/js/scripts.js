
// grab the mainInfo div and text inside
const mainInfo = document.querySelector('.mainInfo');
const text = mainInfo.querySelector("h1");
const walk = 75; // 100px


// create function for shadow and listen for an event
function shadow(e) {
    const { offsetWidth: width, offsetHeight: height } = mainInfo;
    let { offsetX: x, offsetY: y } = e;



    // this refers to the div of mainInfo and e.target refers to whats inside the div
    if (this !== e.target) {
        x = x + e.target.offsetLeft;
        y = y + e.target.offsetTop;
    }

    // if walk is 25 then 13.5 is the highest we will go and -13.5 is the lowest
    const xWalk = Math.round((x / width * walk) - (walk / 2));
    const yWalk = Math.round((y / height * walk) - (walk / 2));

    text.style.textShadow = `
    ${xWalk * 12}px ${yWalk}px 0 rgba(255,0,255,0.7),
    ${xWalk * -12}px ${yWalk}px 0 rgba(0,255,255,0.7),
    ${yWalk}px ${xWalk * -12}px 0 red,
    ${yWalk * -1}px ${xWalk * 12}px 0 rgba(0,0,255,0.7)
    `;
}

// listen for event of mouse move and call shadow function
mainInfo.addEventListener('mousemove', shadow);


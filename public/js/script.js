// This is a constructor
var TxtType = function(el, toRotate, period) {

    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000; //(period: The variable to be converted to an integer || 10 : The radix or base. in this case 10 means base-10 (decimal))
    this.txt = '';

    this.tick(); //called immediately upon object creation ,starting the typing animation
    this.isDeleting = false; //a flag that indicates whether the text is currently being deleted
};


// Main function
TxtType.prototype.tick = function() {

    // Calculate current index for the toRotate array
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i]; //Calculate the current text to display based on whether the text is being deleted or typed

    // Update the text based on whether its deleting or typing
    if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    // Update the HTML of the target element with the new text
    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100; //adjusts the animation speed randomly for a more natural look

    // Adjust delta based on whether it's deleting
    if (this.isDeleting) { delta /= 2; }

    // Update animation parameters based on the state of the animation
    if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
    }

    // Continue the animation with a delay
    setTimeout(function() {
    that.tick();
    }, delta);
};

// Initialize the typing animation on elements with the "typwrite" class
window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

setTimeout(function(){
    var successAlert = document.getElementById('success-alert');
    successAlert.classList.add('hidden');

    // Remove the success-alert div from the DOM after the transition
    setTimeout(function() {
        successAlert.remove();
    }, 1000);
}, 1000);

function setAnswer(value) {
    document.getElementById('answerInput').value = value;

    // Toggle active state for buttons (optional)
    const buttons = document.querySelectorAll('.toggle-buttons button');
    buttons.forEach(button => button.classList.remove('active'));
    event.target.classList.add('active');
}

function setAnswer(value) {
    document.getElementById('answerInput').value = value;
    // Optional: You can add styling for the selected button here
}


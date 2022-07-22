const faders = document.querySelectorAll(".fade-in");
const sliders = document.querySelectorAll(".slide-in");
var images = [];
var time = 6000;
var i = 0;

images[0] = "../images/background2.jpeg";
images[1] = "../images/background3.jpeg";
images[2] = "../images/contact.jpeg";

function changeImg(){
 
  var bg = document.getElementById('change');
  bg.style.background = "url("+images[i]+") , no-repeat";
  bg.style.width = "100%";
  bg.style.backgroundSize = "cover";
  bg.style.objectFit = "cover";
  bg.style.backgroundAttachment = "fixed";
  bg.style.overflow = "hidden";
  
  if(i < images.length - 1){
    i++;
  }else{
    i = 0;
  }

  setTimeout("changeImg()",time);
}

const appearOptions = {
    threshold: 0,
    rootMargin: "0px 0px -250px 0px"
  };
  
  const appearOnScroll = new IntersectionObserver(function(
    entries,
    appearOnScroll
  ) {
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        return;
      } else {
        entry.target.classList.add("appear");
        appearOnScroll.unobserve(entry.target);
      }
    });
  },
  appearOptions);

  faders.forEach(fader => {
    appearOnScroll.observe(fader);
  });

  sliders.forEach(slider => {
    appearOnScroll.observe(slider);
  });

  window.onload = changeImg;
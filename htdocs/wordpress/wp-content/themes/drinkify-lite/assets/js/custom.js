/**
 * Custom JS for theme elements
 */

// ADDED DELAY TO LIST ITEMS
let time = 0.1;

let content = document.querySelectorAll('.wp-block-navigation__container,.wp-block-page-list');
content.forEach((item) => {
  let firstChild = item.childNodes
  firstChild.forEach(item => {
    let lastChild = item.lastChild;
    let ul = 'wp-block-navigation__submenu-container';
    if (lastChild.classList.contains(ul)) {
      lastChild.classList.add('main-list')
      let nestedChild = lastChild.children;
      Array.from(nestedChild).forEach((item, index) => {
        item.setAttribute("style", `transition-delay: ${time / (index + 1)}s`);
      })
    }
  })
})

let cartBtn = document.querySelectorAll('.add_to_cart_button');
cartBtn.forEach((item) => {
  let text = 'added to cart';
  item.addEventListener('click', function () {
    item.innerHTML = text;
  })
})


// SHOW SEARCH FOR WHILE CLICK SEARCH ICON

const searchInput = document.querySelector('.right-section .search-product input[type="search"]');
const mobileIcon = document.querySelector('.wp-mobile-icon-menu');
const searchCont = document.querySelectorAll('.right-section');
const searchDummy = document.querySelector('.dummy-icon .wp-block-search__button');
const searchWrap = document.querySelector('.right-section .search-product');
const drinkifyShowHandler = (e) => {
  e.preventDefault();
  let body = document.body;
  body.classList.toggle('search-toggle');
}
if (searchCont !== null) {
  searchCont.forEach((item) => {
    let searchBtn = document.querySelectorAll('.dummy-icon .wp-block-search__button')
    searchBtn.forEach((btn) => {
      btn.addEventListener('click', drinkifyShowHandler)
    })
  })
  if (mobileIcon !== null && searchDummy !== null && searchWrap !== null) {
    document.addEventListener('click', function (e) {
      if (!searchWrap.contains(e.target) && !searchDummy.contains(e.target) && !mobileIcon.contains(e.target)) {
        let body = document.body;
        body.classList.remove('search-toggle')
      }
    }
    )
  }
}


// SPLIT TEXT OF HEADER 

let lastItem = document.querySelector(".media-content .last-item");
if (lastItem !== null) {
  let innerContent = lastItem.textContent.split('');
  let result = '';
  innerContent.forEach((char) => {
    result += char.trim() === "" ? "" : `<span>${char}</span>`
  })

  lastItem.innerHTML = result
}


window.addEventListener('load', function () {
  let wineText = document.querySelectorAll('.last-item span');
  let headerImage = document.querySelector('.header-image');
  if (headerImage !== null) {
    headerImage.setAttribute('style', `transform: translateX(0)`)
    headerImage.style.opacity = 1
    let textWrap = document.querySelector('.last-item');
    wineText.forEach((item, index) => {
      let times = 0.1;
      // item.setAttribute("style", `transform: translateY(0)`);
      item.setAttribute("style", `transition-delay: ${times * index}s;transform: translateY(0)`);
      item.style.opacity = 1
      textWrap.style.opacity = 1
    })
  }
})

/**
 * Scroll to JS for scroll and drag  horizontal on scroller sections
 * 
 *
 */

const drinkifySellerSection = document.querySelectorAll(".scroller-section .inner-wrap");

if (drinkifySellerSection !== null) {
  let isDown = false;
  let startX;
  let scrollLeft;
  drinkifySellerSection.forEach((item) => {
    const drinkifySellerItems = item.querySelector(".scroller-section .wc-block-grid__products");


    item.addEventListener("mousedown", (e) => {
      isDown = true;
      item.classList.add("active");
      startX = e.pageX - item.offsetLeft;
      scrollLeft = item.scrollLeft;
    });
    item.addEventListener("mouseleave", () => {
      isDown = false;
      item.classList.remove("active");
    });
    item.addEventListener("mouseup", () => {
      isDown = false;
      item.classList.remove("active");
    });
    item.addEventListener("mousemove", (e) => {
      if (!isDown) return;

      e.preventDefault();

      let x = e.pageX - item.offsetLeft;
      let walk = (x - startX) * 3; //scroll-fast

      item.scrollLeft = scrollLeft - walk;
    });
  })
}


// CREATE ELEMENT DIV TO WRAP EXISTING ELEM


window.addEventListener('DOMContentLoaded', function () {

  let divWrapper = document.querySelector('.tnp-subscription-minimal form');

  if (divWrapper !== null) {
    let appendIcon = document.querySelector('.tnp-subscription-minimal .tnp-submit');
    let newElem = document.createElement('div')
    newElem.classList.add('input-wrap');
    let innerAappend = newElem.appendChild(appendIcon)
    divWrapper.appendChild(newElem)
  }
})



// ADD CLASS WHILE SECTION IS IN VIEWPORT

let isInViewport = function (elem) {
  let distance = elem.getBoundingClientRect();
  let windowHeight = window.innerHeight || document.documentElement.clientHeight;
  // Calculate the middle of the element
  let elementMiddle = distance.top + distance.height / 2;
  return (
    elementMiddle >= 0 &&
    elementMiddle <= windowHeight
  );
};
let sections = document.querySelectorAll('.wp-block-section');
if (sections !== null) {
  window.addEventListener('scroll', function (event) {
    // add event on scroll
    sections.forEach(element => {
      //for each .thisisatest
      if (isInViewport(element)) {
        //if in Viewport
        element.classList.add("transition-element");
      }
    });
  }, false);
}

// SHOW MOBILE MENU WHILE SCROLL UP

const header = document.querySelector('.wp-mobile-icon-menu');
if (header !== null) {
  // Variable to store the previous scroll position
  let previousScrollPos = window.pageYOffset || document.documentElement.scrollTop;

  // Function to check the scroll direction
  function handleScroll() {
    if (window.innerWidth < 1200) {
      const currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;

      if (currentScrollPos <= previousScrollPos) {
        // Scrolling up
        header.style.transform = 'none';
      } else {
        // Scrolling down or no movement
        header.style.transform = 'translateY(100%)';
      }

      // Update the previous scroll position
      previousScrollPos = currentScrollPos;
    } else {
      header.style.transform = 'none';
    }

    // Listen for the scroll event
  }
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('load', handleScroll);
window.addEventListener('resize', handleScroll);
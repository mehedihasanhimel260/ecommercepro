// Get the quantity input and buttons
const quantityInput = document.getElementById("quantityInput");
const btnMinus = document.querySelector(".btn-minus");
const btnPlus = document.querySelector(".btn-plus");

// Get the "Add to Cart" button
const addToCartBtn = document.getElementById("addToCartBtn");

// Event listener for the minus button
btnMinus.addEventListener("click", () => {
    let quantity = parseInt(quantityInput.value);
    if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
    }
});

// Event listener for the plus button
btnPlus.addEventListener("click", () => {
    let quantity = parseInt(quantityInput.value);
    quantity++;
    quantityInput.value = quantity;
});

// Event listener for "Add to Cart" button (you can add your logic here)
// addToCartBtn.addEventListener("click", () => {
//     const quantity = parseInt(quantityInput.value);
//     console.log(`Added ${quantity} items to cart!`);
// });

// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});



/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
};


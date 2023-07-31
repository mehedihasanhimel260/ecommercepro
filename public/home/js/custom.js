
    // Get all the plus and minus buttons
    const plusButtons = document.querySelectorAll(".btn-plus");
    const minusButtons = document.querySelectorAll(".btn-minus");

    // Add event listeners to each plus button
    plusButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const input = this.closest(".quantity").querySelector("input");
            let currentValue = parseInt(input.value);
            if (!isNaN(currentValue)) {
                input.value = currentValue + 1;
            }
        });
    });

    // Add event listeners to each minus button
    minusButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const input = this.closest(".quantity").querySelector("input");
            let currentValue = parseInt(input.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                input.value = currentValue - 1;
            }
        });
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


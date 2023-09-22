document.addEventListener('DOMContentLoaded', function() {
    const menuBar = document.querySelector('.menu-bar');
    const navbarMenu = document.querySelector('.navbar-menu');
    const bodyclass = document.body;
    menuBar.addEventListener('click', function() {
        navbarMenu.classList.toggle('show-menu');
        bodyclass.classList.toggle('stop-scroll');
    });
});


function toggleFaq(element) {
    const faqItem = element.parentElement;
    const answer = faqItem.querySelector('.faq-answer');
    const symbol = element.querySelector('.toggle-symbol');
  
    if (faqItem.classList.contains('open')) {
      faqItem.classList.remove('open');
      symbol.textContent = '+';
    } else {
      faqItem.classList.add('open');
      symbol.textContent = '-';
    }
  }


  document.addEventListener("DOMContentLoaded", function() {
    const buyTab = document.querySelector(".crypto_marketplace_tabs_buy");
    const sellTab = document.querySelector(".crypto_marketplace_tabs_sell");
    const buyContent = document.querySelector(".crypto_marketplace_buy");
    const sellContent = document.querySelector(".crypto_marketplace_sell");

    buyTab.addEventListener("click", function() {
        buyTab.classList.add("active");
        sellTab.classList.remove("active");
        buyContent.classList.add("active");
        sellContent.classList.remove("active");
    });

    sellTab.addEventListener("click", function() {
        sellTab.classList.add("active");
        buyTab.classList.remove("active");
        sellContent.classList.add("active");
        buyContent.classList.remove("active");
    });
});



document.addEventListener("DOMContentLoaded", function() {
  let exchangeRate = 1; // Default is 1 for USD
  const coinDropdown = document.getElementById("coins");
  const amountInput = document.getElementById("amount");
  const currencyDropdown = document.getElementById("currency_type");
  const totalElement = document.querySelector(".crypto_marketplace_buy_price_total_amount");
  const transferFeeElement = document.getElementById("transfer_fee_percentage");
  const coinAmountInput = document.getElementById("coin-amount");


  // Function to update the exchange rate based on selected currency
  async function updateExchangeRate() {
      const currency = currencyDropdown.value;
      if (currency === "eur") {
          const response = await fetch('https://api.exchangerate-api.com/v4/latest/USD');
          const data = await response.json();
          exchangeRate = data.rates.EUR;
      } else {
          exchangeRate = 1; 
      }
  }

function updateTotal() {
    const selectedCoin = coinDropdown.options[coinDropdown.selectedIndex];
    const selectedPriceUSD = parseFloat(selectedCoin.getAttribute("data-price"));
    const selectedAmount = parseFloat(amountInput.value) || 0;
    const coinAmount = parseFloat(coinAmountInput.value) || 0;

    if (!selectedPriceUSD || (!selectedAmount && !coinAmount)) {
        totalElement.textContent = ''; 
        return;
    }

    const selectedPrice = selectedPriceUSD * exchangeRate;
    const transferFeeRate = parseFloat(transferFeeElement.getAttribute("value")) / 100;

    if (amountInput.getAttribute('data-user-changed') === 'true') {
        const convertedCoinAmount = (selectedAmount / selectedPrice);
        coinAmountInput.value = convertedCoinAmount.toFixed(4);
    } else if (coinAmountInput.getAttribute('data-user-changed') === 'true') {
        const convertedAmount = (coinAmount * selectedPrice);
        amountInput.value = convertedAmount.toFixed(2);
    }

    let total;
    if (amountInput.getAttribute('data-user-changed') === 'true') {
        total = selectedAmount;
    } else if (coinAmountInput.getAttribute('data-user-changed') === 'true') {
        total = coinAmount * selectedPrice;
    }

    const totalWithFees = total + (total * transferFeeRate);
    let currencySymbol = currencyDropdown.value === 'usd' ? '$' : '€';
    totalElement.textContent = `${currencySymbol}${totalWithFees.toFixed(2)}`;
}



function updateSendRequestLink() {
    // Get the base URL from the data-baseurl attribute
    let baseUrl = document.getElementById('send_request').getAttribute('data-baseurl');

    // Determine if the user is buying or selling based on the active tab class
    let action = document.querySelector('.crypto_marketplace_tabs_buy').classList.contains('active') ? 'buy' : 'sell';

    // Get the selected coin ID and amounts
    const selectedCoinId = coinDropdown.value;
    const selectedAmount = parseFloat(amountInput.value) || 0;
    const coinAmount = parseFloat(document.getElementById("coin-amount").value) || 0; // Added coin-amount input

    // Fetch the dynamic transfer fee and convert it to a fraction
    const transferFeeRate = parseFloat(transferFeeElement.getAttribute("value")) / 100;

    // Get the selected currency (usd or eur)
    const selectedCurrency = currencyDropdown.value;

    // Construct the new URL with named parameters
    let newUrl = `${baseUrl}?type=${action}&coin_id=${selectedCoinId}&coin_amount=${coinAmount}&currency=${selectedCurrency}&transfer_fee_rate=${transferFeeRate}`;

    // Update the 'href' attribute of the 'Send Request' button
    document.getElementById('send_request').setAttribute('href', newUrl);
}


  // Listen to changes
  coinDropdown.addEventListener("change", () => {
    updateTotal();
    updateSendRequestLink();
});
amountInput.addEventListener("input", () => {
    amountInput.setAttribute('data-user-changed', 'true');
    coinAmountInput.setAttribute('data-user-changed', 'false');
    updateTotal();
    updateSendRequestLink();
});

coinAmountInput.addEventListener("input", () => {
    coinAmountInput.setAttribute('data-user-changed', 'true');
    amountInput.setAttribute('data-user-changed', 'false');
    updateTotal();
    updateSendRequestLink();
});


currencyDropdown.addEventListener("change", async () => {
    await updateExchangeRate();
    updateTotal();
    updateSendRequestLink();
});
// Add event listeners for when the buy/sell tabs change
document.querySelector('.crypto_marketplace_tabs_buy').addEventListener("click", updateSendRequestLink);
document.querySelector('.crypto_marketplace_tabs_sell').addEventListener("click", updateSendRequestLink);


  // Call once to initialize
  updateExchangeRate().then(updateTotal);
});


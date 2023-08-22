
<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'sellbuy_crypto') {
            // $module_array = $module['sellbuy_crypto'];
            unset($modules[$key]);
            break;
        }
    }
?>

<section id="crypto" class="container">
    <div class="crypto">
        <div class="crypto_marketplace">
            <div class="crypto_marketplace_tabs">
                <span class="crypto_marketplace_tabs_buy active">Buy Crypto</span>
                <span class="crypto_marketplace_tabs_sell">Sell Crypto</span>
            </div>
            <div class="crypto_marketplace_buy">
                <div class="crypto_marketplace_buy_dropdowns">
                    <div class="crypto_marketplace_buy_dropdowns_coin">
                        <label for="coins">Coin</label>
                        <select id="coins">
                            <option value="bitcoin">Bitcoin</option>
                            <option value="ethereum">Ethereum</option>
                        </select>
                        <div class="fee">
                            <span class="fee_title">Buying fee</span>
                            <span class="fee_price">$4</span>
                        </div>
                    </div>
                    <div class="crypto_marketplace_buy_dropdowns_amount">
                    <label for="amount">Amount</label>
                        <select id="amount">
                            <option value="usd">USD</option>
                            <option value="eur">Euro</option>
                        </select>
                        <div class="fee">
                            <span class="fee_title">Transfer fee</span>
                            <span class="fee_price">2%</span>
                        </div>
                    </div>
                </div>
                <div class="crypto_marketplace_buy_price">
                    <span class="crypto_marketplace_buy_price_title">Total:</span>
                    <span class="crypto_marketplace_buy_price_amount">$2,680</span>
                    <a href="#" class="site_button">Send Request</a>
                </div>
            </div>
        </div>
        <div class="crypto_prices">
            <div class="crypto_prices_info">
                <img src="<?= get_template_directory_uri() ?>/images/Ethereum.png">
                <div class="crypto_prices_info_title">
                    <span class="shortcode">ETH</span>
                    <span class="name">Ethereum</span>
                </div>
            </div>
            <div class="crypto_prices_value">
                <span class="crypto_prices_value_title">Price:</span>
                <span class="crypto_prices_value_amount">$156.83</span>
            </div>
            <div class="crypto_prices_change">
                <span class="crypto_prices_change_title">Change</span>
                <img src="<?= get_template_directory_uri() ?>/images/arrow.png">
                <span class="crypto_prices_change_value">-0.9%</span>
            </div>
        </div>
    </div>
</section>
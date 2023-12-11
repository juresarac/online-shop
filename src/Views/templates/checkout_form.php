<!-- ... payment options and order summary ... -->
<div class="row justify-content-center mt-4">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="row">
                <div class="col-lg-4 radio-group">
                    <!-- Payment Options -->
                    <form action="checkout.php" method="post">
                        <div class="row d-flex px-3 radio payment-card">
                            <img class="pay" src="https://i.imgur.com/WIAP9Ku.jpg" alt="Credit Card">
                            <label class="my-auto">
                                <input type="radio" name="paymentMethod" value="creditCard"> Credit Card
                            </label>
                        </div>
                        <div class="row d-flex px-3 radio gray payment-card">
                            <img class="pay" src="https://i.imgur.com/OdxcctP.jpg" alt="Debit Card">
                            <label class="my-auto">
                                <input type="radio" name="paymentMethod" value="debitCard"> Debit Card
                            </label>
                        </div>
                        <div class="row d-flex px-3 radio gray mb-3 payment-card">
                            <img class="pay" src="https://i.imgur.com/cMk1MtK.jpg" alt="PayPal">
                            <label class="my-auto">
                                <input type="radio" name="paymentMethod" value="paypal"> PayPal
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block" name="checkout">
                                <span>
                                    <span id="checkout">Checkout</span>
                                    <span id="check-amt">$ <?php echo number_format($subtotalAndTotal['total'], 2); ?></span>
                                </span>
                        </button>
                    </form>
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <!-- Payment Form -->
                    <div class="row px-2">
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Name on Card</label>
                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Johnny Doe">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Card Number</label>
                            <input type="text" class="form-control" id="cnum" name="cnum"
                                   placeholder="1111 2222 3333 4444">
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Expiration Date</label>
                            <input type="text" class="form-control" id="exp" name="exp" placeholder="MM/YYYY">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="***">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mt-3 mt-lg-0">
                    <!-- Order Summary -->
                    <div class="row d-flex justify-content-between px-4">
                        <p class="mb-1 text-left">Subtotal</p>
                        <h6 class="mb-1 text-right"><?php echo number_format($subtotalAndTotal['subtotal'], 2); ?></h6>
                    </div>
                    <div class="row d-flex justify-content-between px-4">
                        <p class="mb-1 text-left">Shipping</p>
                        <h6 class="mb-1 text-right">$4</h6>
                    </div>
                    <div class="row d-flex justify-content-between px-4" id="tax">
                        <p class="mb-1 text-left">Total (tax included)</p>
                        <h6 class="mb-1 text-right"><?php echo number_format($subtotalAndTotal['total'], 2); ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

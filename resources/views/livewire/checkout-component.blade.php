<section class="bg-primary" id="page-card">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-blue mt-4" style="text-transform: capitalize;"></h2>
                <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 pt-3">
                <table class="table">
                    <tbody class="fs-18">
                        <tr>
                            <td>SUB TOTAL : </td>
                            <td id="subTotal"><strong>{{ Cart::subtotal() }}</strong></td>
                        </tr>
        <!--                            <tr>
                            <td>DELIVERY FEE : </td>
                            <td><strong>0</strong></td>
                        </tr>-->

                    <tr><td id="promo_amount" style="display: none;">0</td>
                    <td id="promo_id" style="display: none;">0</td>
                    </tr><tr>
                        <td>VAT 16% : </td>
                        <td id="vat_amount"><strong>{{ Cart::tax() }}</strong></td>
                    </tr>
                    <tr>
                        <td><strong class="text-light-blue">TOTAL : </strong></td>
                        <td id="totalPrice"><strong class="text-light-blue">{{ Cart::total() }}</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 col-sm-12 pt-3 wrap-pagination-info">
                    {{-- - --}}
            </div>
        </div>
    </div>
</section>

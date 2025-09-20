
<div class="container">
    <h1>Course Payment</h1>
    <p>You are about to purchase the course: <strong>{{ $course->name }}</strong></p>
    {{-- {{ route('payment.process', $course->id) }} --}}
    <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <label for="card_number">Card Number</label>
            <input type="text" name="card_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="text" name="expiry_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Pay Now</button>
    </form>
</div>


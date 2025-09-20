<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment for {{ $course->name }}</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, sans-serif;
      margin: 0;
      background: #f9fafb;
      color: #333;
    }

    /* Container */
    .payment-container {
      max-width: 1100px;
      margin: 60px auto;
      display: flex;
      gap: 40px;
      padding: 30px;
      border-radius: 12px;
      background: #fff;
      box-shadow: 0 12px 40px rgba(0,0,0,0.08);
      animation: fadeInUp 0.6s ease;
    }

    @keyframes fadeInUp {
      from {opacity:0; transform:translateY(40px);}
      to {opacity:1; transform:translateY(0);}
    }

    /* Course Summary */
    .course-summary {
      flex: 1;
      background: #f9fafb;
      padding: 25px;
      border-radius: 10px;
      border: 1px solid #e5e7eb;
    }

    .course-summary img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .course-summary h2 {
      font-size: 20px;
      margin-bottom: 10px;
      color: #1d3557;
    }

    .course-summary p {
      margin: 6px 0;
      font-size: 15px;
    }

    .price-tag {
      font-size: 22px;
      font-weight: bold;
      color: #4f46e5;
      margin-top: 15px;
    }

    /* Payment Form */
    .payment-form {
      flex: 1.5;
    }

    .payment-form h2 {
      margin-bottom: 20px;
      color: #1d3557;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      font-weight: 600;
      color: #444;
    }

    .form-group input, .form-group select {
      width: 100%;
      padding: 14px 16px;
      border: 1.5px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    .form-group input:focus, .form-group select:focus {
      outline: none;
      border-color: #4f46e5;
      box-shadow: 0 0 0 4px rgba(79,70,229,0.15);
      transform: translateY(-2px);
    }

    .form-row {
      display: flex;
      gap: 20px;
    }

    /* Button */
    .pay-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(90deg,#4f46e5,#4338ca);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
      transition: all 0.3s ease;
    }

    .pay-btn:hover {
      background: linear-gradient(90deg,#4338ca,#312e81);
      box-shadow: 0 10px 20px rgba(79,70,229,0.25);
      transform: translateY(-2px);
    }

    .cards-accepted {
      margin-top: 15px;
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .cards-accepted img {
      height: 26px;
    }
  </style>
</head>
<body>

  <div class="payment-container">
    <!-- Left: Course Summary -->
    <div class="course-summary">
      <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}">
      <h2>{{ $course->name }}</h2>
      <p><strong>Instructor:</strong> {{ $course->trainer }}</p>
      <p><strong>Duration:</strong> {{ $course->duration }}</p>
      <p><strong>User Email:</strong> {{ $user->email }}</p>
      <p class="price-tag">Total: ${{ $course->price }}</p>
    </div>

    <!-- Right: Payment Form -->
    <div class="payment-form">
      <h2>Complete Your Enrollment</h2>
      <form method="POST" action="{{ route('payment.process', $course->id) }}">
        @csrf
        <input type="hidden" name="email" value="{{ $user->email }}">

        <div class="form-group">
  <label for="name">Full Name</label>
  <input type="text" name="name" placeholder="John Doe" required>
</div>

<div class="form-group">
  <label for="address">Billing Address</label>
  <input type="text" name="address" placeholder="123 Main Street, Springfield" required>
</div>

<div class="form-row">
  <div class="form-group" style="flex:1">
    <label for="city">City</label>
    <input type="text" name="city" placeholder="New York" required>
  </div>
  <div class="form-group" style="flex:1">
    <label for="zip">Zip Code</label>
    <input type="text" name="zip" placeholder="10001" required>
  </div>
</div>

<div class="form-group">
  <label for="country">Country</label>
  <select name="country" required>
    <option disabled selected>Select Country</option>
    <option>United States</option>
    <option>Canada</option>
    <option>United Kingdom</option>
    <option>Australia</option>
    <option>India</option>
  </select>
</div>

<div class="form-group">
  <label for="card_number">Card Number</label>
  <input type="text" name="card_number" placeholder="•••• •••• •••• ••••" required>
</div>

<div class="form-row">
  <div class="form-group" style="flex:1">
    <label for="expiry_date">Expiry Date</label>
    <input type="text" name="expiry_date" placeholder="MM/YY" required>
  </div>
  <div class="form-group" style="flex:1">
    <label for="cvv">CVV</label>
    <input type="text" name="cvv" placeholder="123" required>
  </div>
</div>


        <button type="submit" class="pay-btn">Pay ${{ $course->price }} & Enroll Now</button>

        <div class="cards-accepted">
          <span>We accept:</span>
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/MasterCard_Logo.svg" alt="Mastercard">
          <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png" alt="PayPal" style="height:22px;">
        </div>
      </form>
    </div>
  </div>

</body>
</html>

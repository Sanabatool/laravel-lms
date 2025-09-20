<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
   
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<style>
.performance-section {
  background: #ffffff;
  border-radius: 16px;
  padding: 40px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  max-width: 1200px;
  margin: 15px auto;
  transition: transform 0.3s ease;
}

.performance-section:hover {
  transform: translateY(-5px);
}

.performance-section h1 {
  font-size: 32px;
  font-weight: 700;
  color: #343a40;
  margin-bottom: 30px;
  text-align: center;
}

.performance-section button {
  display: block;
  margin: 0 auto 20px auto;
  padding: 10px 20px;
  background: linear-gradient(to right, #007bff, #00c6ff);
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.performance-section button:hover {
  background: linear-gradient(to right, #f66c03, #ff9933);
  transform: scale(1.05);
}

.table {
  background-color: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.07);
}

.table th {
  background-color: #007bff;
  color: #fff;
  font-size: 15px;
  text-align: center;
  padding: 12px;
}

.table td {
  text-align: center;
  padding: 12px;
  vertical-align: middle;
  font-size: 14px;
}

.table tr:nth-child(even) {
  background-color: #f8f9fa;
}

.table a {
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease;
}

.table a:hover {
  color: #f66c03;
}

.table button {
  background: none;
  border: none;
  font-weight: bold;
  transition: color 0.3s ease;
}

.table button:hover {
  color: #d9534f;
}

/* Success Message */
.performance-section p {
  text-align: center;
  font-size: 14px;
  font-weight: 600;
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  border-radius: 6px;
  padding: 10px;
  margin-bottom: 20px;
}

</style>
</head>
<body>
    @extends('layouts.admin')
    @section('admin-content')

            <!-- Performance Analysis Section -->
          <section class="performance-section">
             <h1>users</h1>
              <!-- Success Message -->
              @if (session('success'))
              <p style="color: green;">{{ session('success') }}</p>
              @endif

             <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td><!-- Edit Button -->
                      <a href="{{ route('admin.edit', $user->id) }}" style="color: blue;">
                         <i class="fas fa-edit"></i> Edit
                      </a>
                    <td>
                      <!-- Delete Form -->
                      <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="color: red;" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="fas fa-trash-alt"></i> Delete
                          </button>
                      </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </section>
        
  @endsection 

    <!-- Add Chart.js library for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scripts.js"></script>
    

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin đồ án</h1>

<form action="{{ route('update', $issue->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="mb-3">
            <label for="computer_id" class="form-label">Ten may</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach($computers as $computer)
                <option value="{{ $computer-> id}}" {{ $computer->id == $issue->student_id ? 'selected' : '' }}>{{ $computer->computer_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="reported_by" class="form-label">Nguoi bao cao</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mo ta</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        
        <div class="mb-3">
            <label for="reported_date" class="form-label">Ngày bao cao</label>
            <input type="date" class="form-control" id="reported_date" name="reported_date" required>
        </div>
        <div class="mb-3">
            <label for="urgency" class="form-label">Muc do su co</label>
            <select class="form-control" id="urgency" name="urgency" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trang thai</label>
            <select class="form-control" id="status" name="status" required>
                    <option value="Open">Low</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                
            </select>
        </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>
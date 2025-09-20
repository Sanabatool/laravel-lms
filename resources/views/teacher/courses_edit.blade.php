<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .performance-section {
  background-color: #fff;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
  max-width: 1100px;
  margin: 15px auto;
  transition: all 0.3s ease;
}

.performance-section:hover {
  transform: translateY(-5px);
}

.performance-section h1 {
  font-size: 32px;
  color: #333;
  text-align: center;
  margin-bottom: 30px;
}

.form-group {
  margin-bottom: 25px;
}

label {
  font-weight: bold;
  color: #007bff;
  display: block;
  margin-bottom: 8px;
}

input[type="text"],
input[type="file"],
textarea,
select {
  width: 100%;
  padding: 12px;
  border-radius: 8px;
  border: 1.5px solid #ccc;
  transition: all 0.3s ease;
  background-color: #f8f9fa;
}

input:focus,
textarea:focus,
select:focus {
  border-color: #007bff;
  box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
  background-color: #ffffff;
}

.module {
  background-color: #f1f5ff;
  border-left: 5px solid #007bff;
  padding: 20px;
  margin-top: 30px;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 123, 255, 0.1);
}

.module h4 {
  margin-bottom: 15px;
  font-size: 20px;
  color: #004085;
}

button,
.btn {
  display: inline-block;
  padding: 10px 16px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s ease, transform 0.2s ease;
}

.btn-primary,
button[type="submit"] {
  background: linear-gradient(to right, #007bff, #00c6ff);
  color: white;
}

.btn-primary:hover,
button[type="submit"]:hover {
  background: linear-gradient(to right, #ff6600, #ff9933);
  transform: scale(1.05);
}

.add-video,
.add-document,
.add-quiz,
.delete-module,
#addModule {
  background-color: #17a2b8;
  color: white;
  margin-top: 10px;
  padding: 8px 12px;
  border-radius: 6px;
  font-size: 14px;
}

.add-video:hover,
.add-document:hover,
.add-quiz:hover,
.delete-module:hover,
#addModule:hover {
  background-color: #138496;
}

video {
  display: block;
  margin-top: 10px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
/* quiz */
.quiz {
  margin-top: 20px;
  padding: 15px;
  background: #eef6ff;
  border-left: 4px solid #007bff;
  border-radius: 8px;
}

.question-container {
  margin-top: 15px;
  padding: 12px;
  background: #ffffff;
  border-left: 3px solid #28a745;
  border-radius: 6px;
}

.option-input {
  margin-top: 10px;
  padding-left: 10px;
}


.alert-danger {
  background-color: #f8d7da;
  color: #721c24;
  border-left: 6px solid #f44336;
  padding: 15px;
  margin-bottom: 20px;
  border-radius: 6px;
}
/* animation effect to newly added modules: */
.animate-fade-in {
    animation: fadeIn 0.5s ease-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

</head>
<body>
    @extends('layouts.admin')
    @section('admin-content')

          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <section class="performance-section">
            <h1>Update Course</h1>
            <br>
            <form action="{{ route('teacher.courses_update', $course->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-row">
    <div class="form-group">
        <label for="name">Course Name</label>
        <input type="text" name="name" id="name" value="{{ $course->name }}" required>
    </div>

    <div class="form-group">
        <label for="package_id">Package</label>
        <select name="package_id" required>
            @foreach($packages as $package)
            <option value="{{ $package->id }}" {{ $course->package_id == $package->id ? 'selected' : '' }}>
                {{ $package->name }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="trainer">Trainer</label>
        <input type="text" name="trainer" id="trainer" value="{{ $course->trainer }}" required>
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" name="duration" id="duration" value="{{ $course->duration }}" required>
    </div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" rows="4" required>{{ $course->description }}</textarea>
</div>

<div class="form-group">
    <label for="image">Course Image</label>
    <input type="file" name="image" id="image" accept="image/*">
    <div class="course-image-preview">
        <img src="{{ asset('storage/' . $course->image) }}" alt="Current Image">
    </div>
</div>


              <div id="modules-wrapper">
  @foreach($course->modules as $moduleIndex => $module)
      <div class="module" id="module-{{ $moduleIndex }}">
          <input type="hidden" name="modules[{{ $moduleIndex }}][id]" value="{{ $module->id }}">
          <h4>Module {{ $moduleIndex + 1 }}</h4>

          {{-- Videos --}}
          <div class="videos-section">
              <label>Videos:</label>
              <div class="videos">
                @foreach($module->videos as $videoIndex => $video)
                    <div class="video-item">
                        <video controls width="200">
                            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                        </video>
                        <input type="file" name="modules[{{ $moduleIndex }}][videos][{{ $videoIndex }}][file]" accept="video/*">
                        <input type="hidden" name="modules[{{ $moduleIndex }}][videos][{{ $videoIndex }}][id]" value="{{ $video->id }}">
                    </div>
                @endforeach
                </div>
                <button type="button" class="add-video" data-module="{{ $moduleIndex }}">Add Video</button>

          </div>

          {{-- Documents --}}
          <div class="documents-section">
              <label>Documents:</label>
              <div class="documents">
              @foreach($module->documents as $docIndex => $document)
                <div class="document-item">
                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">
                        {{ basename($document->file_path) }}
                    </a>
                    <input type="file" name="modules[{{ $moduleIndex }}][documents][{{ $docIndex }}][file]" />
                    <input type="hidden" name="modules[{{ $moduleIndex }}][documents][{{ $docIndex }}][id]" value="{{ $document->id }}">
                </div>
               @endforeach
                </div>
                <button type="button" class="add-document" data-module="{{ $moduleIndex }}">Add Document</button>
          </div>

         {{-- Quizzes --}}
<div class="quizzes-section">
    <label>Quizzes:</label>
    <div class="quiz">
        @foreach($module->quizzes as $quizIndex => $quiz)
            <div class="quiz" data-quiz-index="{{ $quizIndex }}">
                <input type="text" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][title]" value="{{ $quiz->title }}" placeholder="Quiz Title">
                <input type="hidden" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][id]" value="{{ $quiz->id }}">

                <div class="questions">
                    @foreach($quiz->questions as $questionIndex => $question)
                        <div class="question-container">
                            <input type="text" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][questions][{{ $questionIndex }}][title]" value="{{ $question->title }}" placeholder="Question Text">
                            <input type="hidden" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][questions][{{ $questionIndex }}][id]" value="{{ $question->id }}">

                            @foreach($question->options as $optionIndex => $option)
                                <div class="option-input">
                                    <input type="text" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][questions][{{ $questionIndex }}][options][{{ $optionIndex }}][text]" value="{{ $option->text }}" placeholder="Option Text">
                                    <input type="checkbox" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][questions][{{ $questionIndex }}][options][{{ $optionIndex }}][is_correct]" {{ $option->is_correct ? 'checked' : '' }}>
                                    <input type="hidden" name="modules[{{ $moduleIndex }}][quizzes][{{ $quizIndex }}][questions][{{ $questionIndex }}][options][{{ $optionIndex }}][id]" value="{{ $option->id }}">
                                    <label>Correct</label>
                                </div>
                            @endforeach

                            <button type="button" class="add-option" data-module="{{ $moduleIndex }}" data-quiz="{{ $quizIndex }}" data-question="{{ $questionIndex }}">Add Option</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="add-question" data-module="{{ $moduleIndex }}" data-quiz="{{ $quizIndex }}">Add Question</button>
            </div>
        @endforeach
    </div>

    <button type="button" class="add-quiz" data-module="{{ $moduleIndex }}">Add Quiz</button>
</div>


          <button type="button" class="delete-module" data-module-index="{{ $moduleIndex }}">Delete Module</button>
          
      </div>
  @endforeach
</div>
<button type="button" class="addModule" id="addModule">Add Module</button>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ $course->price }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
            </form>
          
        </section>  
    @endsection 

    <!-- Add Chart.js library for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scripts.js"></script>

    <script>
let moduleIndex = document.querySelectorAll('.module').length;

// Global Add Module Button
document.body.addEventListener('click', function(e) {
    if (e.target.id === 'addModule') {
        addNewModule();
    }
});


function addNewModule() {
    const wrapper = document.getElementById('modules-wrapper');
    const html = `
        <div class="module" id="module-${moduleIndex}">
            <h4>Module ${moduleIndex + 1}</h4>
            <input type="hidden" name="modules[${moduleIndex}][id]" value="">
            <div class="videos-section">
                <label>Videos:</label>
                <div class="videos">
                    <input type="file" name="modules[${moduleIndex}][videos][0][file]" accept="video/*">
                </div>
                <button type="button" class="add-video" data-module="${moduleIndex}">Add Video</button>
            </div>

            <div class="documents-section">
                <label>Documents:</label>
                <div class="documents">
                    <input type="file" name="modules[${moduleIndex}][documents][0][file]">
                </div>
                <button type="button" class="add-document" data-module="${moduleIndex}">Add Document</button>
            </div>

            <div class="quizzes-section">
                <label>Quizzes:</label>
                <div class="quizzes">
                    <input type="text" name="modules[${moduleIndex}][quizzes][0][title]" placeholder="Quiz Title">
                </div>
                <button type="button" class="add-quiz" data-module="${moduleIndex}">Add Quiz</button>
            </div>

            <button type="button" class="delete-module" data-module-index="${moduleIndex}">Delete Module</button>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', html);
    moduleIndex++;
}

// Delegated event listener for delete/add inputs
document.getElementById('modules-wrapper').addEventListener('click', function (e) {
    const target = e.target;

    if (target.classList.contains('delete-module')) {
    const index = target.dataset.moduleIndex;
    const moduleEl = document.getElementById(`module-${index}`);
    const hiddenIdInput = moduleEl.querySelector(`input[name="modules[${index}][id]"]`);
    if (hiddenIdInput && hiddenIdInput.value) {
    let wrapper = document.getElementById('modules-wrapper');
    wrapper.insertAdjacentHTML('beforeend',
        `<input type="hidden" name="deleted_modules[]" value="${hiddenIdInput.value}">`);
}

    moduleEl.remove();
}


   if (target.classList.contains('add-video')) {
    const index = target.dataset.module;
    const container = target.closest('.videos-section').querySelector('.videos');
    const count = container.querySelectorAll('.video-item, input[type="file"]').length;
    const newVideoHTML = `
        <div class="video-item">
            <input type="file" name="modules[${index}][videos][${count}][file]" accept="video/*">
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newVideoHTML);
}

if (target.classList.contains('add-document')) {
    const index = target.dataset.module;
    const container = target.closest('.documents-section').querySelector('.documents');
    const count = container.querySelectorAll('.document-item, input[type="file"]').length;
    const newDocHTML = `
        <div class="document-item">
            <input type="file" name="modules[${index}][documents][${count}][file]">
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newDocHTML);
}

if (target.classList.contains('add-quiz')) {
    const moduleIndex = target.dataset.module;
    const quizContainer = target.closest('.quizzes-section').querySelector('.quizzes');
    const quizCount = quizContainer.querySelectorAll('.quiz').length;
    const quizHTML = `
        <div class="quiz" data-quiz-index="${quizCount}">
            <input type="text" name="modules[${moduleIndex}][quizzes][${quizCount}][title]" placeholder="Quiz Title">
            <div class="questions"></div>
            <button type="button" class="add-question" data-module="${moduleIndex}" data-quiz="${quizCount}">Add Question</button>
        </div>
    `;
    quizContainer.insertAdjacentHTML('beforeend', quizHTML);
}

if (target.classList.contains('add-question')) {
    const moduleIndex = target.dataset.module;
    const quizIndex = target.dataset.quiz;
    const quizElement = target.closest('.quiz');
    const questions = quizElement.querySelectorAll('.question-container');
    const newQuestionIndex = questions.length;
    const questionHTML = `
        <div class="question-container">
            <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${newQuestionIndex}][title]" placeholder="Question Text" />
            <div class="option-input">
                <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${newQuestionIndex}][options][0][text]" placeholder="Option Text" />
                <input type="checkbox" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${newQuestionIndex}][options][0][is_correct]" />
                <label>Correct</label>
            </div>
            <button type="button" class="add-option" data-module="${moduleIndex}" data-quiz="${quizIndex}" data-question="${newQuestionIndex}">Add Option</button>
        </div>
    `;
    quizElement.querySelector('.questions').insertAdjacentHTML('beforeend', questionHTML);
}

if (target.classList.contains('add-option')) {
    const moduleIndex = target.dataset.module;
    const quizIndex = target.dataset.quiz;
    const questionIndex = target.dataset.question;
    const questionContainer = target.closest('.question-container');
    const options = questionContainer.querySelectorAll('.option-input');
    const optionIndex = options.length;
    const optionHTML = `
        <div class="option-input">
            <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][options][${optionIndex}][text]" placeholder="Option Text" />
            <input type="checkbox" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][options][${optionIndex}][is_correct]" />
            <label>Correct</label>
        </div>
    `;
    questionContainer.insertAdjacentHTML('beforeend', optionHTML);
}

});
</script>
  
</body>
</html>
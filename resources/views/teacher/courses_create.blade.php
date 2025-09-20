<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    @extends('layouts.admin')
    @section('admin-content')
        
 <div class="form-container">
  <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Course Info -->
    <div class="form-section">
      <h3><i class="fas fa-book"></i> Course Information</h3>

      <div class="form-grid">
        <div class="form-group">
          <label for="name">Course Name</label>
          <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
          <label for="package_id">Package</label>
          <select name="package_id" id="package_id" required>
            @foreach($packages as $package)
              <option value="{{ $package->id }}">{{ $package->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="trainer">Trainer</label>
          <input type="text" name="trainer" id="trainer" value="{{ old('trainer', $trainerName ?? '') }}" readonly>
        </div>

        <div class="form-group">
          <label for="duration">Duration</label>
          <input type="text" name="duration" id="duration" required>
        </div>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4" required></textarea>
      </div>

      <div class="form-group">
        <label for="image">Course Image</label>
        <input type="file" name="image" id="image" accept="image/*" required>
      </div>
    </div>

    <!-- Modules -->
    <div class="form-section">
      <h3><i class="fas fa-layer-group"></i> Modules</h3>

      <div id="modules">
        <!-- Module 0 (initial) -->
        <div class="module">
          <h4>Module 1</h4>

          <div class="videos-section">
            <label>Videos:</label>
            <div class="videos">
              <div class="video-block">
                <input type="file" name="modules[0][videos][0][file]" accept="video/*" required>
              </div>
            </div>
            <button type="button" class="add-video">
              <i class="fas fa-plus-circle"></i> Add Video
            </button>
          </div>

          <div class="documents-section">
            <label>Documents:</label>
            <div class="documents">
              <div class="document-block">
                <input type="file" name="modules[0][documents][0][file]" accept=".pdf,.docx,.pptx" required>
              </div>
            </div>
            <button type="button" class="add-document">
              <i class="fas fa-plus-circle"></i> Add Document
            </button>
          </div>

          <div class="quizzes-section">
            <label>Quizzes:</label>
            <div class="quizzes">
              <div class="quiz-block">
                <input type="text" name="modules[0][quizzes][0][title]" placeholder="Quiz Title">
                <div class="questions">
                  <div class="question-block">
                    <input type="text" name="modules[0][quizzes][0][questions][0][title]" placeholder="Question Title">
                    <div class="options">
                      <div class="option-block">
                        <input type="text" name="modules[0][quizzes][0][questions][0][options][0][text]" placeholder="Option Text">
                        <label>
                          <input type="checkbox" name="modules[0][quizzes][0][questions][0][options][0][is_correct]"> Correct
                        </label>
                      </div>
                    </div>
                    <button type="button" class="add-option">Add Option</button>
                  </div>
                </div>
                <button type="button" class="add-question">Add Question</button>
                <hr>
              </div>
            </div>
            <button type="button" class="add-quiz">
              <i class="fas fa-plus-circle"></i> Add Quiz
            </button>
          </div>
        </div>
      </div>

      <button type="button" id="addModule">
        <i class="fas fa-plus-circle"></i> Add Module
      </button>
    </div>

    <!-- Pricing -->
    <div class="form-section">
      <h3><i class="fas fa-dollar-sign"></i> Pricing</h3>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" required>
      </div>
    </div>

    <button type="submit">Add Course</button>
  </form>
</div>
@endsection

<!-- No Chart.js or scripts.js – not used here -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modulesRoot = document.getElementById('modules');
  const addModuleBtn = document.getElementById('addModule');

  // ---------- Helpers ----------
  const getModuleIndex = (moduleEl) =>
    Array.from(document.querySelectorAll('#modules .module')).indexOf(moduleEl);

  const renumberModuleHeadings = () => {
    document.querySelectorAll('#modules .module h4').forEach((h4, i) => {
      h4.textContent = 'Module ' + (i + 1);
    });
  };

  const moduleTemplate = (moduleIndex) => `
    <div class="module">
      <h4>Module ${moduleIndex + 1}</h4>

      <div class="videos-section">
        <label>Videos:</label>
        <div class="videos">
          <div class="video-block">
            <input type="file" name="modules[${moduleIndex}][videos][0][file]" accept="video/*">
          </div>
        </div>
        <button type="button" class="add-video">
          <i class="fas fa-plus-circle"></i> Add Video
        </button>
      </div>

      <div class="documents-section">
        <label>Documents:</label>
        <div class="documents">
          <div class="document-block">
            <input type="file" name="modules[${moduleIndex}][documents][0][file]" accept=".pdf,.docx,.pptx">
          </div>
        </div>
        <button type="button" class="add-document">
          <i class="fas fa-plus-circle"></i> Add Document
        </button>
      </div>

      <div class="quizzes-section">
        <label>Quizzes:</label>
        <div class="quizzes">
          <div class="quiz-block">
            <input type="text" name="modules[${moduleIndex}][quizzes][0][title]" placeholder="Quiz Title">
            <div class="questions">
              <div class="question-block">
                <input type="text" name="modules[${moduleIndex}][quizzes][0][questions][0][title]" placeholder="Question Title">
                <div class="options">
                  <div class="option-block">
                    <input type="text" name="modules[${moduleIndex}][quizzes][0][questions][0][options][0][text]" placeholder="Option Text">
                    <label>
                      <input type="checkbox" name="modules[${moduleIndex}][quizzes][0][questions][0][options][0][is_correct]"> Correct
                    </label>
                  </div>
                </div>
                <button type="button" class="add-option">Add Option</button>
              </div>
            </div>
            <button type="button" class="add-question">Add Question</button>
            <hr>
          </div>
        </div>
        <button type="button" class="add-quiz">
          <i class="fas fa-plus-circle"></i> Add Quiz
        </button>
      </div>
    </div>
  `;

  // ---------- Add Module ----------
  addModuleBtn.addEventListener('click', function () {
    const newIndex = document.querySelectorAll('#modules .module').length;
    modulesRoot.insertAdjacentHTML('beforeend', moduleTemplate(newIndex));
    renumberModuleHeadings();
  });

  // ---------- Event Delegation for all module actions ----------
  modulesRoot.addEventListener('click', function (e) {
    const btn = e.target.closest('button');
    if (!btn) return;

    const moduleEl = btn.closest('.module');
    if (!moduleEl) return;

    const moduleIndex = getModuleIndex(moduleEl);

    // Add Video
    if (btn.classList.contains('add-video')) {
      const videosContainer = moduleEl.querySelector('.videos');
      const videoIndex = videosContainer.querySelectorAll('.video-block').length;
      const videoHTML = `
        <div class="video-block">
          <input type="file" name="modules[${moduleIndex}][videos][${videoIndex}][file]" accept="video/*">
        </div>`;
      videosContainer.insertAdjacentHTML('beforeend', videoHTML);
      return;
    }

    // Add Document
    if (btn.classList.contains('add-document')) {
      const documentsContainer = moduleEl.querySelector('.documents');
      const docIndex = documentsContainer.querySelectorAll('.document-block').length;
      const docHTML = `
        <div class="document-block">
          <input type="file" name="modules[${moduleIndex}][documents][${docIndex}][file]" accept=".pdf,.docx,.pptx">
        </div>`;
      documentsContainer.insertAdjacentHTML('beforeend', docHTML);
      return;
    }

    // Add Quiz
    if (btn.classList.contains('add-quiz')) {
      const quizzesContainer = moduleEl.querySelector('.quizzes');
      const quizIndex = quizzesContainer.querySelectorAll('.quiz-block').length;
      const quizHTML = `
        <div class="quiz-block">
          <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][title]" placeholder="Quiz Title" required>
          <div class="questions">
            <div class="question-block">
              <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][0][title]" placeholder="Question Title" required>
              <div class="options">
                <div class="option-block">
                  <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][0][options][0][text]" placeholder="Option Text" required>
                  <label>
                    <input type="checkbox" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][0][options][0][is_correct]"> Correct
                  </label>
                </div>
              </div>
              <button type="button" class="add-option">Add Option</button>
            </div>
          </div>
          <button type="button" class="add-question">Add Question</button>
          <hr>
        </div>`;
      quizzesContainer.insertAdjacentHTML('beforeend', quizHTML);
      return;
    }

    // Add Question
    if (btn.classList.contains('add-question')) {
      const quizBlock = btn.closest('.quiz-block');
      const questionsContainer = quizBlock.querySelector('.questions');
      const questionIndex = questionsContainer.querySelectorAll('.question-block').length;

      const quizzesContainer = quizBlock.parentElement; // .quizzes
      const quizIndex = Array.from(quizzesContainer.querySelectorAll('.quiz-block')).indexOf(quizBlock);

      const questionHTML = `
        <div class="question-block">
          <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][title]" placeholder="Question Title" required>
          <div class="options">
            <div class="option-block">
              <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][options][0][text]" placeholder="Option Text" required>
              <label>
                <input type="checkbox" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][options][0][is_correct]"> Correct
              </label>
            </div>
          </div>
          <button type="button" class="add-option">Add Option</button>
        </div>`;
      questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
      return;
    }

    // Add Option
    if (btn.classList.contains('add-option')) {
      const questionBlock = btn.closest('.question-block');
      const optionsContainer = questionBlock.querySelector('.options');

      const quizBlock = btn.closest('.quiz-block');
      const quizzesContainer = quizBlock.parentElement; // .quizzes
      const quizIndex = Array.from(quizzesContainer.querySelectorAll('.quiz-block')).indexOf(quizBlock);
      const questionIndex = Array.from(quizBlock.querySelectorAll('.question-block')).indexOf(questionBlock);
      const optionIndex = optionsContainer.querySelectorAll('.option-block').length;

      const optionHTML = `
        <div class="option-block">
          <input type="text" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][options][${optionIndex}][text]" placeholder="Option Text" required>
          <label>
            <input type="checkbox" name="modules[${moduleIndex}][quizzes][${quizIndex}][questions][${questionIndex}][options][${optionIndex}][is_correct]"> Correct
          </label>
        </div>`;
      optionsContainer.insertAdjacentHTML('beforeend', optionHTML);
      return;
    }
  });
});
</script>
</body>
</html>
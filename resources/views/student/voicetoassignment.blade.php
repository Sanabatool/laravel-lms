<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voice to Assignment</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background:#3b82f6;
      color: #333;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .voice-section {
      width: 90%;
      max-width: 900px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      padding: 30px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    .voice-section h2 {
      margin-bottom: 15px;
      font-size: 26px;
      color: #444;
    }

    .voice-section p {
      margin-bottom: 20px;
      color: #666;
    }

    #editor {
      height: 200px;
      margin-bottom: 20px;
      border-radius: 10px;
      background: #fafafa;
    }

    .voice-actions button {
      margin: 10px;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 600;
      color: white;
      transition: 0.3s;
    }

    .voice-actions button:first-child {
      background: #ff5722;
    }
    .voice-actions button:first-child:hover {
      background: #e64a19;
    }

    .voice-actions button:nth-child(2) {
      background: #4caf50;
    }
    .voice-actions button:nth-child(2):hover {
      background: #388e3c;
    }

    .voice-actions button:nth-child(3) {
      background: #2196f3;
    }
    .voice-actions button:nth-child(3):hover {
      background: #1976d2;
    }

    .preview-box {
      margin-top: 25px;
      text-align: left;
      background: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #ddd;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .translator {
      margin: 20px auto;
    }
  </style>
</head>
<body>

<section class="voice-section">
  <h2>🎤 Voice to Assignment</h2>
  <p>Speak or type your answer below. Format it, then submit and download as PDF.</p>

  <!-- Rich Text Editor -->
  <div id="editor"></div>

  <!-- Buttons -->
  <div class="voice-actions">
    <button onclick="startListening()">🎙️ Start Speaking</button>
    <button onclick="submitAssignment()">📄 Submit Assignment</button>
    <button onclick="downloadPDF()">⬇️ Download PDF</button>
  </div>

  <!-- 🌍 Google Translate Widget -->
  <div id="google_translate_element" class="translator"></div>

  <!-- Submitted Preview -->
  <div id="assignmentPreview" class="preview-box" style="display:none;">
    <h3>📑 Assignment Preview</h3>
    <div id="submittedText"></div>
  </div>
</section>

<!-- ✅ Quill Rich Text Editor -->
<script src="https://cdn.jsdelivr.net/npm/quill/dist/quill.min.js"></script>
<script>
  let recognition;
  const quill = new Quill('#editor', {
    theme: 'snow',
    placeholder: 'Start speaking or typing here...',
    modules: {
      toolbar: [['bold', 'italic', 'underline'], [{ 'list': 'ordered'}, { 'list': 'bullet' }], ['clean']]
    }
  });

  function startListening() {
    if (!('webkitSpeechRecognition' in window)) {
      alert("Sorry, your browser doesn't support speech recognition.");
      return;
    }
    recognition = new webkitSpeechRecognition();
    recognition.lang = "en-US"; // can be "ur-PK" or "hi-IN"
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;
    recognition.onresult = (event) => {
      let currentText = quill.root.innerHTML;
      let spokenText = event.results[0][0].transcript + " ";
      quill.root.innerHTML = currentText + spokenText;
    };
    recognition.start();
  }

  function submitAssignment() {
    const text = quill.root.innerHTML.trim();
    if (!text) {
      alert("Please write or speak something before submitting.");
      return;
    }
    document.getElementById("submittedText").innerHTML = text;
    document.getElementById("assignmentPreview").style.display = "block";
  }

  async function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const text = quill.getText().trim();
    if (!text) {
      alert("Please write something before downloading.");
      return;
    }

    doc.setFont("helvetica", "normal");
    doc.setFontSize(12);
    const marginLeft = 15;
    const marginTop = 20;

    const lines = doc.splitTextToSize(text, 180); 
    doc.text(lines, marginLeft, marginTop);

    doc.save("assignment.pdf");
  }
</script>

<!-- ✅ Google Translate Script -->
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {pageLanguage: 'en'},
      'google_translate_element'
    );
  }
</script>
<script type="text/javascript" 
  src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>

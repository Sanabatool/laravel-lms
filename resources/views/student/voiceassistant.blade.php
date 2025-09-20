<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voice Assistant</title>
  <style>
    body {
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #2196f3, #42a5f5, #64b5f6);
  color: #ffffff;
  height: 100vh;
  display: flex;
}

header {
  width: 95%;
  padding: 20px 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: rgba(255, 255, 255, 0.15);
  position: fixed;
  top: 0;
  left: 0;
  backdrop-filter: blur(10px);
}

header h1 {
  font-size: 22px;
  font-weight: bold;
  letter-spacing: 1px;
  color: #e3f2fd;
}

nav a {
  margin: 0 15px;
  text-decoration: none;
  color: #e3f2fd;
  font-weight: 500;
  transition: 0.3s;
}
nav a:hover {
  color: #ffeb3b;
}

.hero {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 50px;
}

.hero-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1100px;
  width: 100%;
}

.speaker {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
}

.speaker img {
  max-width: 300px;
  filter: drop-shadow(0 0 30px rgba(255, 255, 255, 0.3));
}

.text-box {
  flex: 1;
  text-align: left;
  padding-left: 40px;
}

.text-box h2 {
  font-size: 42px;
  font-weight: bold;
  margin-bottom: 15px;
  color: #e3f2fd;
}

.text-box p {
  font-size: 18px;
  margin-bottom: 20px;
  line-height: 1.6;
  color: #f1f8ff;
}

button {
  background: #1e88e5;
  border: none;
  color: white;
  padding: 14px 26px;
  border-radius: 30px;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  box-shadow: 0 4px 10px rgba(30, 136, 229, 0.4);
}
button:hover {
  background: #1565c0;
}

#voiceQAResult {
  margin-top: 20px;
  font-size: 16px;
  text-align: left;
  line-height: 1.5;
  padding: 15px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 10px;
  color: #e3f2fd;
}

  </style>
</head>
<body>

<header>
  <h1>🎤 Voice Assistant</h1>
  <nav>
    <a href="{{ route('home') }}">Home</a>
  </nav>
</header>

<section class="hero">
  <div class="hero-content">
    <!-- Left: Speaker / AI graphic -->
    <div class="speaker">
      <img src="images/pngimg.com - microphone_PNG7927.png" alt="Voice Assistant Speaker">
    </div>

    <!-- Right: Info + Button -->
    <div class="text-box">
      <h2>VOICE ASSISTANT</h2>
      <p>Ask any question by speaking, and AI will detect the best match and answer instantly.</p>
      <button onclick="startVoiceQA()">🎙 Start Speaking</button>
      <div id="voiceQAResult"></div>
    </div>
  </div>
</section>

<script>
  // --- Q&A Bank (kept your full list) ---
  const qaBank = [
    { q: "what is javascript", a: "JavaScript is a scripting language used to build interactive web pages." },
    { q: "what is closure", a: "A closure is a function that remembers variables from its outer scope even after that scope has finished executing." },
    { q: "what is python", a: "Python is a high-level, interpreted programming language used in AI, data science, and web development." },
    { q: "what is html", a: "HTML stands for HyperText Markup Language, used to structure web pages." },
    { q: "what is css", a: "CSS stands for Cascading Style Sheets, used for styling web pages." },
    { q: "difference between var let const", a: "var is function-scoped, let and const are block-scoped. const cannot be reassigned." },
    { q: "what is react", a: "React is a JavaScript library for building user interfaces." },
    { q: "what is node js", a: "Node.js is a JavaScript runtime environment that allows running JS outside the browser." },
    { q: "what is api", a: "API stands for Application Programming Interface. It allows communication between software components." },
    { q: "what is database", a: "A database is a collection of structured data stored electronically for quick access and management." },
    { q: "what is mongodb", a: "MongoDB is a NoSQL document-oriented database that stores data in JSON-like format." },
    { q: "what is sql", a: "SQL stands for Structured Query Language, used to manage and query relational databases." },
    { q: "what is oop", a: "OOP stands for Object-Oriented Programming, a paradigm based on objects and classes." },
    { q: "what is array", a: "An array is a data structure that holds a collection of values in a single variable." },
    { q: "what is function", a: "A function is a block of reusable code that performs a specific task." },
    { q: "what is loop", a: "A loop is a programming construct that repeats a block of code until a condition is met." },
    { q: "what is ai", a: "AI stands for Artificial Intelligence, simulating human intelligence in machines." },
    { q: "what is machine learning", a: "Machine Learning is a subset of AI where systems learn from data patterns without being explicitly programmed." },
    { q: "what is cloud computing", a: "Cloud computing delivers computing services like storage, databases, and servers over the internet." },
    { q: "what is cyber security", a: "Cybersecurity is the practice of protecting systems, networks, and data from digital attacks." },
    { q: "what is java", a: "Java is a versatile, object-oriented programming language used for web, mobile, and enterprise applications." },
    { q: "what is c language", a: "C is a powerful low-level programming language widely used for system programming and embedded systems." },
    { q: "what is c++", a: "C++ is an extension of C with object-oriented features, used in gaming, system software, and high-performance applications." },
    { q: "what is c#", a: "C# is a programming language developed by Microsoft for building desktop, web, and mobile applications on the .NET framework." },
    { q: "what is php", a: "PHP is a server-side scripting language mainly used for web development." },
    { q: "what is ruby", a: "Ruby is a dynamic programming language known for simplicity and is popular with the Ruby on Rails framework." },
    { q: "what is go language", a: "Go (Golang) is an open-source language developed by Google, designed for performance and concurrency." },
    { q: "what is swift", a: "Swift is a programming language developed by Apple for iOS and macOS application development." },
    { q: "what is kotlin", a: "Kotlin is a modern language officially supported for Android development." },
    { q: "what is r language", a: "R is a programming language widely used for statistical computing and data visualization." },
    { q: "what is typescript", a: "TypeScript is a superset of JavaScript that adds static typing for better development experience." },
    { q: "what is angular", a: "Angular is a TypeScript-based web framework for building dynamic single-page applications." },
    { q: "what is vue js", a: "Vue.js is a progressive JavaScript framework for building user interfaces." },
    { q: "what is django", a: "Django is a high-level Python web framework that encourages rapid development and clean design." },
    { q: "what is flask", a: "Flask is a lightweight Python web framework used to build APIs and web applications." },
    { q: "what is spring boot", a: "Spring Boot is a Java framework that simplifies building production-ready applications." },
    { q: "what is git", a: "Git is a version control system used to track changes in code and collaborate with others." },
    { q: "what is github", a: "GitHub is a platform for hosting and managing Git repositories with collaboration features." },
    { q: "what is docker", a: "Docker is a platform that packages applications into containers for consistent deployment." },
    { q: "what is devops", a: "DevOps is a set of practices combining development and operations for faster software delivery." },
    { q: "how many courses are available", a: "Our platform offers more than 100+ courses across programming, AI, web development, and cybersecurity." },
    { q: "what are the main features of the platform", a: "Features include AI-powered personalized learning, progress tracking, quizzes, and certifications." },
    { q: "does the platform support ai integration", a: "Yes, our platform uses AI to recommend courses, provide instant doubt-solving, and create personalized learning paths." },
    { q: "can i track my progress", a: "Yes, you can track your progress with dashboards, quizzes, and performance analytics." },
    { q: "do you provide certificates", a: "Yes, we provide certificates after successfully completing each course." },
    { q: "can ai generate quizzes for me", a: "Yes, our AI automatically generates quizzes and practice tests based on your learning history." },
    { q: "is there a community support", a: "Yes, our platform includes discussion forums, AI-powered chatbots, and peer learning communities." }
  ];

  // --- Utility: Find best match ---
  function findBestMatch(question) {
    question = question.toLowerCase();
    let bestMatch = { a: "❌ Sorry, I couldn’t find an answer. Try again.", score: 0 };

    qaBank.forEach(item => {
      let score = 0;
      item.q.split(" ").forEach(word => {
        if (question.includes(word)) score++;
      });
      if (score > bestMatch.score) {
        bestMatch = { a: item.a, score };
      }
    });

    return bestMatch.a;
  }

  // --- Voice Q&A Function ---
  function startVoiceQA() {
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) {
      document.getElementById("voiceQAResult").innerHTML = "<p>❌ Speech Recognition not supported in this browser.</p>";
      return;
    }

    const recognition = new SpeechRecognition();
    recognition.lang = "en-US";
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;
    recognition.start();

    document.getElementById("voiceQAResult").innerHTML = "<p>🎙 Listening...</p>";

    recognition.onresult = (event) => {
      const question = event.results[0][0].transcript;
      const answer = findBestMatch(question);

      document.getElementById("voiceQAResult").innerHTML = `
        <p><b>🎙 You asked:</b> ${question}</p>
        <p><b>🤖 Answer:</b> ${answer}</p>
      `;

      // Speak Answer
      const speech = new SpeechSynthesisUtterance(answer);
      window.speechSynthesis.speak(speech);
    };

    recognition.onerror = (event) => {
      document.getElementById("voiceQAResult").innerHTML = `<p>❌ Error: ${event.error}</p>`;
    };

    recognition.onend = () => {
      console.log("Speech recognition ended.");
    };
  }
  // Voice Assistant API Backend
const express = require("express");
const bodyParser = require("body-parser");
const cors = require("cors");

const app = express();
app.use(cors());
app.use(bodyParser.json());

// Core voice assistant controller
const VoiceController = {
  processQuery: (query) => {
    const keywords = {
      hello: "Hello! I'm your voice assistant.",
      time: `The current time is ${new Date().toLocaleTimeString()}.`,
      date: `Today is ${new Date().toLocaleDateString()}.`,
      weather: "Weather service is temporarily unavailable, please try later.",
    };

    // Select a response based on keyword
    for (let key in keywords) {
      if (query.toLowerCase().includes(key)) {
        return keywords[key];
      }
    }

    // Fallback response
    return "I'm still learning, but I received your request.";
  },
};

// API route
app.post("/api/voice/query", (req, res) => {
  const { query } = req.body;

  if (!query || query.trim() === "") {
    return res.status(400).json({
      status: "error",
      message: "No query provided",
    });
  }

  const responseText = VoiceController.processQuery(query);

  const result = {
    status: "success",
    query,
    response: responseText,
    timestamp: new Date().toISOString(),
  };

  res.json(result);
});

// Health check route
app.get("/api/health", (req, res) => {
  res.json({
    status: "ok",
    service: "Voice Assistant API",
    uptime: process.uptime(),
  });
});

// Start server
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
  console.log(`Voice Assistant API running on http://localhost:${PORT}`);
});

</script>

</body>
</html>

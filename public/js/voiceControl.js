document.addEventListener("DOMContentLoaded", () => {
    const button = document.getElementById('start-voice');
    if (!button) return;

    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.continuous = false;

    button.addEventListener('click', () => {
        recognition.start();
    });

    recognition.onresult = async (event) => {
        const command = event.results[0][0].transcript.toLowerCase();
        console.log("Voice command:", command);
        await processCommand(command);
    };

    async function processCommand(command) {
        // Simple direct browser commands
        if (command.includes("scroll down")) {
            window.scrollBy(0, 500);
        } else if (command.includes("scroll up")) {
            window.scrollBy(0, -500);
        } else if (command.includes("register")) {
            window.location.href = "/register";
        } else if (command.includes("login")) {
            window.location.href = "/login";
        } else if (command.includes("go to dashboard")) {
            window.location.href = "/student/dashboard";
        } else if (command.includes("logout")) {
            window.location.href = "/logout";
        } else {
            // Send to Python Flask NLP API
            const response = await fetch("http://127.0.0.1:5000/parse", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ command: command })
            });

            const result = await response.json();
            console.log("Flask response:", result);

            if (result.action === "enroll" && result.course_id) {
                window.location.href = `/courses/${result.course_id}/enroll`;
            } else if (result.action === "go_dashboard") {
                window.location.href = "/student/dashboard";
            } else {
                alert("Sorry, voice command not recognized.");
            }
        }
    }
});

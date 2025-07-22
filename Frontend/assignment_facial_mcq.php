<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Facial Theory MCQ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .timer-box {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      padding: 10px 15px;
      border-radius: 8px;
      display: inline-block;
      font-size: 1.2rem;
      font-weight: bold;
    }
    .question-label {
      font-weight: 500;
      font-size: 1.1rem;
    }
  </style>

  <script>
    let timeLeft = 600; // 10 minutes in seconds
    function startTimer() {
      const timerElement = document.getElementById('timer');
      const interval = setInterval(() => {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        if (--timeLeft < 0) {
          clearInterval(interval);
          alert('Time is up! Submitting your answers...');
          document.getElementById('mcqForm').submit();
        }
      }, 1000);
    }
    window.onload = startTimer;
  </script>
</head>

<body class="container mt-5 mb-5">

<div class="text-end">
  <div class="timer-box">
    ⏱️ Time Left: <span id="timer">10:00</span>
  </div>
  <div class="text-muted mt-1" style="font-size: 0.95rem;">
    📝 2 attempts left out of 3
  </div>
</div>


  <p><strong>Instructions:</strong> Answer all 15 questions before the timer runs out. All questions are mandatory.</p>

  <form method="post" action="submit_assignment.php" id="mcqForm">

    <?php
    $questions = [
      "What is the outermost layer of the skin?" => ["Epidermis", "Dermis"],
      "Which product is used to tone the skin?" => ["Cleanser", "Toner"],
      "What is the ideal pH of facial cleansers?" => ["Around 5.5", "Around 8.5"],
      "Which of these is a benefit of steaming?" => ["Opens pores", "Dries the skin"],
      "What should be applied after cleansing?" => ["Moisturizer", "Toner"],
      "How long should a standard facial massage last?" => ["10 minutes", "30 minutes"],
      "Which layer contains collagen?" => ["Dermis", "Epidermis"],
      "Which product helps to exfoliate?" => ["Scrub", "Moisturizer"],
      "What is used to identify a client’s skin type?" => ["Consultation", "Random guess"],
      "Which tool is used in deep cleansing?" => ["Extractor", "Foundation brush"],
      "Which skin type shows large pores and oil?" => ["Oily", "Dry"],
      "What is a common active ingredient in moisturizers?" => ["Glycerin", "Alcohol"],
      "How often should exfoliation be done?" => ["2-3 times/week", "Every day"],
      "What type of mask is best for oily skin?" => ["Clay mask", "Cream mask"],
      "Which area is most sensitive on the face?" => ["Under the eyes", "Forehead"]
    ];

    $qNo = 1;
    foreach ($questions as $question => $options) {
      echo '<div class="mb-4">';
      echo '<label class="question-label">' . $qNo . '. ' . $question . '</label>';
      foreach ($options as $index => $option) {
        $optLetter = chr(65 + $index); // A, B, ...
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="radio" name="q' . $qNo . '" value="' . $optLetter . '" required>';
        echo '<label class="form-check-label">' . $option . '</label>';
        echo '</div>';
      }
      echo '</div>';
      $qNo++;
    }
    ?>

    <div class="d-flex gap-3 mt-4">
      <button type="submit" class="btn btn-success">Submit</button>
      <a href="course_view.php" class="btn btn-secondary">Cancel</a>
    </div>
  </form>

</body>
</html>

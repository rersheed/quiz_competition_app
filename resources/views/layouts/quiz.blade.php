<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Quiz Application')</title>
    <style>
        * {
            padding: 0%;
            margin: 0%;
        }

        .quiz-body {
            background-color: #256a81 !important;
            color: white;
            text-align: center;
            height: 100vh;
            max-height: 1000vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .quiz-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            margin: 10px 0;
            text-transform: uppercase;
        }

        .participant-info {
            font-size: 1.2rem;
            color: #ddd;
            font-style: italic;
            margin: 0;
        }

        .text-info {
            font-weight: bold;
            color: #00bcd4;
        }

        .question-info {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .options-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            justify-content: center;
        }

        .option-button {
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: justify;
            color: white;
            background-color: transparent;
            border: 2px solid;
            border-image: linear-gradient(45deg, red, pink, purple, yellow) 1;
            border-radius: 25px !important;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .option-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        .btn-secondary {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid;
            border-image: linear-gradient(45deg, gray, lightgray) 1;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.4);
            transform: scale(1.05);
        }

        .participant {
            display: block;
            /* Ensures each button takes a full line */
            width: 100%;
            /* Makes the button span the container's width */
            padding: 20px 10px;
            /* Increases padding for a bigger clickable area */
            font-size: 1.5rem;
            /* Makes the text size large enough for readability */
            font-weight: bold;
            /* Emphasizes the text */
            text-align: center;
            /* Centers the text */
            color: white;
            /* Keeps the text white for contrast */
            background-color: rgba(0, 0, 0, 0.4);
            /* Semi-transparent black background */
            border: 2px solid;
            /* Adds a border for better visibility */
            border-image: linear-gradient(45deg, gray, lightgray) 1;
            /* Gradient border */
            border-radius: 15px;
            /* Smooths the corners */
            cursor: pointer;
            /* Adds a pointer on hover */
            margin-bottom: 15px;
            /* Adds spacing between buttons */
            transition: all 0.3s ease-in-out;
            /* Smooth transition for hover effects */
        }

        .participant:hover {
            background-color: rgba(255, 255, 255, 0.2);
            /* Slightly highlights on hover */
            transform: scale(1.05);
            /* Slight zoom effect */
        }

        .participant:active {
            transform: scale(0.98);
            /* Shrinks slightly on click */
            background-color: rgba(255, 255, 255, 0.1);
            /* Fades on click */
        }

        .participant:focus {
            outline: none;
            /* Removes default focus outline */
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            /* Glow effect */
        }

        .questions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            /* Adjust grid column size dynamically */
            gap: 50px;
            /* Adds space between the circles */
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            width: 100%;
            /* Ensures the grid fits within the container */
            max-width: 100%;
            /* Prevents overflow */
            padding: 10px;
            /* Adds padding inside the grid */
            box-sizing: border-box;
            /* Ensures padding doesn't affect grid size */
        }

        .quiz-container {
            margin: auto;
            max-width: 90%;
            width: 80%;
            padding: 30px;
            /* Reduced padding for smaller screens */
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
            overflow: auto;
            /* Allows scrolling if content overflows */
        }

        .question-circle {
            width: 100px;
            /* Adjusted size for smaller screens */
            height: 100px;
            /* Matches width for perfect circle */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            /* Adjusted for better readability */
            font-weight: bold;
            text-align: center;
            border-radius: 50%;
            border: 3px solid transparent;
            transition: all 0.3s ease-in-out;
        }

        /* Adjust sizes for larger screens */
        @media screen and (min-width: 768px) {
            .question-circle {
                width: 120px;
                height: 120px;
                font-size: 2rem;
            }

            .quiz-container {
                padding: 50px;
                /* Increased padding for larger screens */
            }
        }

        /* Clickable (Active) Questions */
        .question-circle.active {
            background: linear-gradient(45deg, #4caf50, #81c784);
            /* Green gradient background */
            color: white;
            /* White text */
            cursor: pointer;
            /* Pointer cursor for clickable items */
            border-color: #4caf50;
            /* Green border */
        }

        .question-circle.active:hover {
            transform: scale(1.1);
            /* Slight zoom effect on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            /* Subtle shadow for hover effect */
        }

        /* Non-Clickable (Inactive) Questions */
        .question-circle.inactive {
            background: #ccc;
            /* Light gray background */
            color: #666;
            /* Darker gray text */
            cursor: not-allowed;
            /* Not-allowed cursor for non-clickable items */
            border-color: #aaa;
            /* Gray border */
            opacity: 0.7;
            /* Slight transparency */
        }

        .question-circle.inactive:hover {
            transform: none;
            /* No scaling for inactive items */
            box-shadow: none;
            /* No shadow effect */
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="quiz-body">
        <!-- Quiz Title and Participant Info -->
        <h1>&nbsp;</h1>
        <h1 class="quiz-title">@yield('heading')</h1>
        <p class="participant-info">@yield('subheading')</p>

        <!-- Quiz Container -->
        <div class="quiz-container">
            @yield('content')
        </div>

        <!-- Navigation -->
        @yield('back-button')
        <span>&nbsp;</span>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    @stack('scripts')
</body>

</html>

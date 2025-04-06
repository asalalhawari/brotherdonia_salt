@extends('site.layout.master')

@section('css')
<style>
    :root {
                --primary-color: #c4962d;
                --secondary-color: #901a1d;
                --text-color: #25252e;
            }
            
        /* Main Content */
        .main-content {
            padding: 40px 0;
        }
        
        .content-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .page-title {
            font-size: 24px;
            color: var(--text-color);
            margin-bottom: 8px;
            position: relative;
            display: inline-block;
            padding-left: 15px;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background-color: var(--primary-color);
        }
        
        .page-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 40px;
        }
        
        /* Form */
        .booking-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        
        .form-left-column,
        .form-right-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .form-label {
            font-size: 14px;
            color: var(--text-color);
        }
        
        .form-input, .form-select {
            padding: 7px;
            border: 1px solid var(--primary-color);
            border-radius: 15px;
            font-size: 14px;
            outline: none;
            width: 100%;
            height: 103%;
        }
        
        .select-wrapper {
            position: relative;
        }
        
        .select-wrapper select {
            appearance: none;
            padding-left: 30px;
            background: #fff;
        }
        
        .select-wrapper .fa-chevron-down,
        .date-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            pointer-events: none;
            font-size: 14px;
        }
        
        .notes-group {
            grid-column: span 2;
            display: flex;
            flex-direction: column;
        }
        
        .form-textarea {
            padding: 12px;
            border: 1px solid var(--primary-color);
            border-radius: 15px;
            font-size: 14px;
            outline: none;
            width: 50%;
            min-height: 150px;
            resize: vertical;
        }
        
        .submit-container {
            grid-column: span 2;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .submit-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 40px;
            font-size: 16px;
            cursor: pointer;
        }
        
        /* Phone input */
        .phone-group {
            position: relative;
        }
        
        .country-code {
            position: absolute;
            right: 10px;
            top: 50%;
            display: flex;
            align-items: center;
            gap: 5px;
            z-index: 2;
            cursor: pointer;
        }
        
        .country-flag {
            width: 24px;
            height: 16px;
            background-image: url('https://flagcdn.com/w40/jo.png');
            background-size: cover;
        }
        
        /* Date picker */
        .date-picker {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            width: 300px;
            background: white;
            border: 1px solid var(--primary-color);
            border-radius: 6px;
            z-index: 10;
            padding: 10px;
            margin-top: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .date-picker.active {
            display: block;
        }
        
        .date-picker-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .date-picker-month {
            font-weight: bold;
        }
        
        .date-picker-nav {
            cursor: pointer;
            padding: 5px;
        }
        
        .date-picker-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        
        .date-picker-day-name {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            padding: 5px;
        }
        
        .date-picker-day {
            text-align: center;
            padding: 5px;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .date-picker-day:hover {
            background-color: #f5f5f5;
        }
        
        .date-picker-day.selected {
            background-color: var(--primary-color);
            color: white;
        }
        
        .date-picker-day.other-month {
            color: #ccc;
        }
        
        @media (max-width: 768px) {
            .booking-form {
                grid-template-columns: 1fr;
            }
            
            .notes-group {
                grid-column: span 1;
            }
            
            .submit-container {
                grid-column: span 1;
            }
            
            .date-picker {
                width: 100%;
            }
        }
        
        /* Success Popup Styles */
        .success-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .success-popup.active {
            display: flex;
        }
        
        .popup-content {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .popup-icon {
            width: 80px;
            height: 80px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }
        
        .popup-icon i {
            color: white;
            font-size: 40px;
        }
        
        .popup-title {
            font-size: 24px;
            color: var(--text-color);
            margin-bottom: 15px;
            font-weight: bold;
        }
        
        .popup-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        
        .popup-close {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            font-size: 16px;
            cursor: pointer;
        }
        
        .popup-close:hover {
            background-color: #7a1619;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <main class="main-content">
        <div class="content-wrapper">
            <h1 class="page-title">{{ __('Plan Your Event') }}</h1>
            <p class="page-subtitle">{{ __('We are happy to fulfill your special requests and support you with an unforgettable experience of flavors and sweets') }}</p>
            
            <form action="{{ route('occasions.store') }}" method="POST" class="booking-form">
                @csrf
                <div class="form-left-column">
                    <div class="form-group">
                        <label class="form-label">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">{{ __('Address') }}</label>
                        <input type="text" name="address" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">{{ __('Event Type') }}</label>
                        <input type="text" name="event_type" class="form-input" required>
                    </div>
                </div>
                
                <div class="form-right-column">
                    <div class="form-group phone-group">
                        <label class="form-label">{{ __('Mobile Number') }}</label>
                        <input type="tel" name="phone" class="form-input" required>
                        <div class="country-code">
                            <div class="country-flag"></div>
                            <span>+962</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">{{ __('Event Date') }}</label>
                        <input type="date" name="event_date" id="event-date" class="form-input" required>
                        <div id="date-picker" class="date-picker">
                            <div class="date-picker-header">
                                <button id="prev-month" class="date-picker-nav">&lt;</button>
                                <div id="current-month" class="date-picker-month"></div>
                                <button id="next-month" class="date-picker-nav">&gt;</button>
                            </div>
                            <div id="date-picker-days" class="date-picker-days"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">{{ __('Approximate Number of Guests') }}</label>
                        <input type="number" name="guest_count" class="form-input">
                    </div>
                </div>
                
                <div class="notes-group">
                    <label class="form-label">{{ __('Notes') }}</label>
                    <textarea name="notes" class="form-textarea form-input"></textarea>
                </div>
                
                <div class="submit-container">
                    <button type="submit" class="submit-btn" onclick="showSuccessPopup(); return true;">{{ __('Submit Request') }}</button>
                </div>
            </form>
        </div>
    </main>
</div>

<!-- Success Popup -->
<div id="success-popup" class="success-popup">
    <div class="popup-content">
        <div class="popup-icon">
            <i class="fas fa-check"></i>
        </div>
        <h3 class="popup-title">{{ __('تم الحجز بنجاح!') }}</h3>
        <p class="popup-message">{{ __('شكراً لك! لقد تم استلام طلبك بنجاح. سيتم التواصل معك في أقرب وقت ممكن.') }}</p>
        <button id="close-popup" class="popup-close">{{ __('حسناً') }}</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Date picker functionality
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('event-date');
        const datePicker = document.getElementById('date-picker');
        const daysContainer = document.getElementById('date-picker-days');
        const currentMonthElement = document.getElementById('current-month');
        const prevMonthButton = document.getElementById('prev-month');
        const nextMonthButton = document.getElementById('next-month');
        
        let currentDate = new Date();
        let selectedDate = null;
        
        // Month names in English instead of Arabic
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        
        // Day names in English instead of Arabic
        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        
        // Toggle date picker
        dateInput.addEventListener('click', function() {
            datePicker.classList.toggle('active');
            renderCalendar();
        });
        
        // Close date picker when clicking outside
        document.addEventListener('click', function(e) {
            if (!dateInput.contains(e.target) && !datePicker.contains(e.target)) {
                datePicker.classList.remove('active');
            }
        });
        
        // Previous month
        prevMonthButton.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });
        
        // Next month
        nextMonthButton.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });
        
        // Render calendar
        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            // Set current month text
            currentMonthElement.textContent = `${monthNames[month]} ${year}`;
            
            // Clear previous days
            daysContainer.innerHTML = '';
            
            // Add day names
            for (let i = 0; i < 7; i++) {
                const dayNameElement = document.createElement('div');
                dayNameElement.classList.add('date-picker-day-name');
                dayNameElement.textContent = dayNames[i];
                daysContainer.appendChild(dayNameElement);
            }
            
            // Get first day of month
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            
            // Get day of week for first day (0 = Sunday, 6 = Saturday)
            let firstDayOfWeek = firstDay.getDay();
            
            // Add days from previous month
            const prevMonthLastDay = new Date(year, month, 0).getDate();
            for (let i = firstDayOfWeek - 1; i >= 0; i--) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('date-picker-day', 'other-month');
                dayElement.textContent = prevMonthLastDay - i;
                daysContainer.appendChild(dayElement);
            }
            
            // Add days of current month
            for (let i = 1; i <= lastDay.getDate(); i++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('date-picker-day');
                dayElement.textContent = i;
                
                // Check if this day is selected
                if (selectedDate && 
                    selectedDate.getDate() === i && 
                    selectedDate.getMonth() === month && 
                    selectedDate.getFullYear() === year) {
                    dayElement.classList.add('selected');
                }
                
                // Add click event
                dayElement.addEventListener('click', function() {
                    selectedDate = new Date(year, month, i);
                    
                    // Format date as DD/MM/YYYY
                    const formattedDate = `${i.toString().padStart(2, '0')}/${(month + 1).toString().padStart(2, '0')}/${year}`;
                    dateInput.value = formattedDate;
                    
                    // Close date picker
                    datePicker.classList.remove('active');
                });
                
                daysContainer.appendChild(dayElement);
            }
            
            // Add days from next month
            const totalCells = 42; // 6 rows of 7 days
            const daysFromCurrentMonth = lastDay.getDate();
            const daysFromPrevMonth = firstDayOfWeek;
            const daysFromNextMonth = totalCells - daysFromCurrentMonth - daysFromPrevMonth;
            
            for (let i = 1; i <= daysFromNextMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('date-picker-day', 'other-month');
                dayElement.textContent = i;
                daysContainer.appendChild(dayElement);
            }
        }
    });
    
    // Country code dropdown
    document.querySelector('.country-code').addEventListener('click', function() {
        // In a real implementation, you would show a dropdown of country codes
        alert('Country codes list will open');
    });
    
    // Success popup functionality
    const successPopup = document.getElementById('success-popup');
    const closePopupBtn = document.getElementById('close-popup');
    
    // Function to show the popup
    function showSuccessPopup() {
        // Show the popup after a slight delay to allow form submission
        setTimeout(function() {
            successPopup.classList.add('active');
        }, 500);
    }
    
    // Close popup when button is clicked
    closePopupBtn.addEventListener('click', function() {
        successPopup.classList.remove('active');
    });
    
    // Close popup when clicking outside
    successPopup.addEventListener('click', function(e) {
        if (e.target === successPopup) {
            successPopup.classList.remove('active');
        }
    });
</script>
@endsection
let nav = 0;
let clicked = null; 
let event = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('event')) : [];

const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
const weekdays = ['maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag'];

function openModal() {
    newEventModal.style.display = 'block';
    backDrop.style.display = 'block';
}

function load() { 
    const dt = new Date();

    if (nav !== 0) {
        dt.setMonth(new Date().getMonth() + nav);
    }

    const day = dt.getDate();
    const month = dt.getMonth();
    const year = dt.getFullYear();

    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const dateString = firstDayOfMonth.toLocaleDateString('nl-nl', {
        weekday: 'long',
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
    });

    const paddingDays = weekdays.indexOf(dateString.split(' ')[0]);
    document.getElementById('monthDisplay').innerText = `${dt.toLocaleDateString('nl-nl', { month: 'long'})} ${year}`;

    calendar.innerHTML = '';
    for(let i = 1; i <= paddingDays + daysInMonth; i++) {
        const daySquare = document.createElement('div');
        daySquare.classList.add('day');
        if (i > paddingDays) {
            daySquare.innerHTML = i - paddingDays;
            daySquare.addEventListener('click', openModal);
        } else {
            daySquare.classList.add('padding');
        }
        calendar.appendChild(daySquare);
    }
}
 
function closeModal() {
    newEventModal.style.display = 'none';
    backDrop.style.display = 'none';
    eventTitleInput.value = '';
    clicked = null;
    load();
}

function initButtons() {
    document.getElementById('nextButton').addEventListener('click', () => {
        nav++;
        load();
    })
    document.getElementById('backButton').addEventListener('click', () => {
        nav--;
        load();
    })
    document.getElementById('saveButton').addEventListener('click', () => {});
    document.getElementById('cancelButton').addEventListener('click', closeModal);
}

initButtons();
load();



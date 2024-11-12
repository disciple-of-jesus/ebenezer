class WordOfGod {
    title;
    wayOfShowing;
    shortSummary;
    givenAt;

    constructor(title, wayOfShowing, shortSummary) {
        this.title = title;
        this.wayOfShowing = wayOfShowing;
        this.shortSummary = shortSummary;
        this.givenAt = new Date();
    }
}

let applicationDatabase;
const openDatabaseRequest = window.indexedDB.open("ebenezer", 3);

openDatabaseRequest.onupgradeneeded = (event) => {
    applicationDatabase = event.target.result;

    applicationDatabase.createObjectStore("wordsToRemember", {autoIncrement: true});
};

openDatabaseRequest.onsuccess = (event) => {
    applicationDatabase = event.target.result;

    applicationDatabase.onerror = (event) => {
        console.error(`Database error: ${event.target.error?.message}`);
    };

    displayStonesOfRemembrances();
};

// This uses the DOM (Document Object Model). The DOM is an in-memory representation of the HTML structure.
const titleInput = document.getElementById('titleInput');
const mannerInput = document.getElementById('mannerInput');
const contextInput = document.getElementById('contextInput');
const listOfStones = document.getElementById('listOfStones');

function ariseStoneOfRemembrance() {
    let title = titleInput.value;
    let wayOfShowing = mannerInput.value;
    let shortSummary = contextInput.value;

    let wordOfGod = new WordOfGod(title, wayOfShowing, shortSummary);

    const addToDatabaseRequest = applicationDatabase
        .transaction(["wordsToRemember"], "readwrite")
        .objectStore('wordsToRemember')
        .add(wordOfGod);

    addToDatabaseRequest.onsuccess = (event) => {
        displayStonesOfRemembrances();

        titleInput.value = mannerInput.value = contextInput.value = '';
    };
}

function displayStonesOfRemembrances() {
    const getFromDatabaseRequest = applicationDatabase
        .transaction(['wordsToRemember'], 'readonly')
        .objectStore('wordsToRemember')
        .getAll();

    getFromDatabaseRequest.onsuccess = (event) => {
        listOfStones.innerHTML = '';

        getFromDatabaseRequest.result.forEach((wordOfGod) => {
            let displayElement = document.createElement('li');

            // This is DOM tree manipulation. The browser paints the window based on the DOM tree. Therefore, by manipulating the DOM tree the
            // you change elements on the screen.
            displayElement.innerText = `${wordOfGod.givenAt.toLocaleDateString('nl-NL')}: God leerde mij '${wordOfGod.title}' door '${wordOfGod.wayOfShowing}'. Korte toelichting: '${wordOfGod.shortSummary}'.`;

            listOfStones.appendChild(displayElement);
        });
    };
}

// Register service worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('service-worker.js').then((registration) => {
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, (err) => {
            console.log('ServiceWorker registration failed: ', err);
        });
    });
}

let deferredPrompt;
const installButton = document.getElementById('installButton');

window.addEventListener('beforeinstallprompt', (e) => {
    console.log('beforeinstallprompt event fired');
    e.preventDefault();
    deferredPrompt = e;
    installButton.style.display = 'block';

    installButton.addEventListener('click', () => {
        installButton.style.display = 'none';
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('User accepted the install prompt');
            } else {
                console.log('User dismissed the install prompt');
            }
            deferredPrompt = null;
        });
    });
});
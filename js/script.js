let darkMode = localStorage.getItem("darkMode");
const darkModeToggle = document.querySelector("#switch");

const enableDarckMode = () => {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => {
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkMode", "null");
};

if (darkMode === "enabled"){
    enableDarckMode();
}

darkModeToggle.addEventListener("click", () => {
    darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled"){
        enableDarckMode();
        
    }else {
        disableDarkMode();
    }
});

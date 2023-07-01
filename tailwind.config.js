//https://stackblitz.com/edit/daisyui-vue-vite-nmbyr6/?file=src%2FApp.vue,vite.config.js,tailwind.config.js
module.exports = {
    content: ["./src/**/*.{vue,js,ts}"],
    plugins: [
        require("@tailwindcss/container-queries"),
        require("daisyui")
    ],
    daisyui: {
        themes: [
            "light",
            "dark",
            "cupcake",
            "bumblebee",
            "emerald",
            "corporate",
            "synthwave",
            "retro",
            "cyberpunk",
            "valentine",
            "halloween",
            "garden",
            "forest",
            "aqua",
            "lofi",
            "pastel",
            "fantasy",
            "wireframe",
            "black",
            "luxury",
            "dracula",
            "cmyk",
            "autumn",
            "business",
            "acid",
            "lemonade",
            "night",
            "coffee",
            "winter"
        ]
    }
}

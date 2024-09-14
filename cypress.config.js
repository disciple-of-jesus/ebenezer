const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    setupNodeEvents(on, config) {
      // Empty space to sooze in :)
    },
    supportFile: false,
    specPattern: 'cypress/*.spec.js'
  },
});
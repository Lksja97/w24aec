class ApiRequest {
    /**
     * Creates an instance of the ApiRequest class.
     * @param {string} url - The base URL for the API.
     * @param {string|null} tokenName - The key name for the token in localStorage.
     */
    constructor(url, tokenName = null) {
        this.baseUrl = url; // Base URL for API requests
        this.tokenName = tokenName; // Token name for localStorage
    }

    /**
     * Private method to get the headers including the Authorization token if available.
     * @return {object} - The headers object.
     */
    _getHeaders() {
        const headers = {};
        if (this.tokenName) {
            const token = localStorage.getItem(this.tokenName); // Get the token from localStorage
            if (token) {
                headers["Authorization"] = `Bearer ${token}`; // Add the Authorization token
            }
        }
        return headers; // Return the headers object
    }

    /**
     * Private method to handle error responses.
     * Redirects to login.html if the response has a status of 403 (forbidden).
     * @param {number} status - The response status code.
     */
    _handleForbidden(status) {
        if (status === 403) {
            window.location.href = "login.html"; // Redirect to the login page
        }
    }

    /**
     * Sends a GET request to the specified endpoint.
     * @param {string} endpoint - The API endpoint to request.
     * @return {Promise<object|false>} - Returns a promise that resolves to the response or false on error.
     */
    get(endpoint = '') {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${this.baseUrl}${endpoint}`, // Complete URL for the request
                type: 'GET', // HTTP method
                headers: this._getHeaders(), // Get headers
                success: function(response) {
                    console.log("GET Response:", response); // Log successful response
                    resolve(response); // Return response
                },
                error: function(jqXHR) {
                    console.error("GET Error:", jqXHR); // Log error
                    this._handleForbidden(jqXHR.status); // Handle forbidden status
                    reject(jqXHR); // Return error for more context
                }.bind(this) // Bind this to ensure it refers to the ApiRequest instance
            });
        });
    }

    /**
     * Sends a POST request to the specified endpoint with the provided object.
     * @param {object} object - The data to send in the POST request.
     * @param {string} endpoint - The API endpoint to send the request to.
     * @return {Promise<object|false>} - Returns a promise that resolves to the response or false on error.
     */
    post(object, endpoint = '') {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${this.baseUrl}${endpoint}`, // Complete URL for the request
                type: 'POST', // HTTP method
                data: JSON.stringify(object), // Data as a JSON string
                contentType: 'application/json', // Set content type to JSON
                headers: this._getHeaders(), // Get headers
                success: function(response) {
                    console.log("POST Response:", response); // Log successful response
                    resolve(response); // Return response
                },
                error: function(jqXHR) {
                    console.error("POST Error:", jqXHR); // Log error
                    this._handleForbidden(jqXHR.status); // Handle forbidden status
                    reject(jqXHR); // Return error for more context
                }.bind(this) // Bind this to ensure it refers to the ApiRequest instance
            });
        });
    }

    /**
     * Sends a POST request to the specified endpoint with form data created from the provided object.
     * @param {object} object - The object to convert to FormData.
     * @param {string} endpoint - The API endpoint to send the request to.
     * @return {Promise<object|false>} - Returns a promise that resolves to the response or false on error.
     */
    postForm(object, endpoint = '') {
        return new Promise((resolve, reject) => {
            // Create FormData from the provided object
            const formData = new FormData();
            for (const key in object) {
                if (object.hasOwnProperty(key)) {
                    formData.append(key, object[key]); // Append key-value pair to FormData
                }
            }

            $.ajax({
                url: `${this.baseUrl}${endpoint}`, // Complete URL for the request
                type: 'POST', // HTTP method
                data: formData, // FormData as data
                contentType: false, // Important for FormData
                processData: false, // Important for FormData
                headers: this._getHeaders(), // Get headers
                success: function(response) {
                    console.log("POST Form Response:", response); // Log successful response
                    resolve(response); // Return response
                },
                error: function(jqXHR) {
                    console.error("POST Form Error:", jqXHR); // Log error
                    this._handleForbidden(jqXHR.status); // Handle forbidden status
                    reject(jqXHR); // Return error for more context
                }.bind(this) // Bind this to ensure it refers to the ApiRequest instance
            });
        });
    }
}

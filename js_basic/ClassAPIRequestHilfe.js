class ApiRequest {
    /**
     * Erstellt eine Instanz der ApiRequest-Klasse.
     * @param {string} url - Die Basis-URL für die API.
     * @param {string|null} tokenName - Der Schlüsselname für das Token in localStorage.
     */
    constructor(url, tokenName = null) {
        this.baseUrl = url; // Basis-URL für API-Anfragen
        this.tokenName = tokenName; // Token-Name für localStorage
    }

    /**
     * Private Methode, um die Header einschließlich des Autorisierungstokens zu erhalten, falls verfügbar.
     * @return {object} - Das Header-Objekt.
     */
    _getHeaders() {
        const headers = {};
        if (this.tokenName) {
            const token = localStorage.getItem(this.tokenName);
            if (token) {
                headers["Authorization"] = `Bearer ${token}`; // Autorisierungstoken hinzufügen
            }
        }
        return headers; // Gibt das Header-Objekt zurück
    }

    /**
     * Private Methode zur Behandlung von Fehlerantworten.
     * Leitet zu login.html um, wenn die Antwort den Status 403 (verboten) hat.
     * @param {number} status - Der Statuscode der Antwort.
     */
    _handleForbidden(status) {
        if (status === 403) {
            window.location.href = "login.html"; // Umleitung zur Login-Seite
        }
    }

    /**
     * Sendet eine GET-Anfrage an den angegebenen Endpunkt.
     * @param {string} endpoint - Der API-Endpunkt, der angefordert werden soll.
     * @return {Promise<object|false>} - Gibt ein Promise zurück, das auf die Antwort aufgelöst wird oder false im Fehlerfall.
     */
    get(endpoint = '') {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${this.baseUrl}${endpoint}`, // Vollständige URL für die Anfrage
                type: 'GET', // HTTP-Methode
                headers: this._getHeaders(), // Header abrufen
                success: function(response) {
                    console.log("GET-Antwort:", response); // Erfolgreiche Antwort protokollieren
                    resolve(response); // Antwort zurückgeben
                },
                error: function(jqXHR) {
                    console.error("GET-Fehler:", jqXHR); // Fehler protokollieren
                    this._handleForbidden(jqXHR.status); // Forbidden-Status behandeln
                    reject(jqXHR); // Fehler zurückgeben für mehr Kontext
                }.bind(this) // bind this to ensure it refers to the ApiRequest instance
            });
        });
    }

    /**
     * Sendet eine POST-Anfrage an den angegebenen Endpunkt mit dem bereitgestellten Objekt.
     * @param {object} object - Die Daten, die in der POST-Anfrage gesendet werden sollen.
     * @param {string} endpoint - Der API-Endpunkt, an den die Anfrage gesendet werden soll.
     * @return {Promise<object|false>} - Gibt ein Promise zurück, das auf die Antwort aufgelöst wird oder false im Fehlerfall.
     */
    post(object, endpoint = '') {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${this.baseUrl}${endpoint}`, // Vollständige URL für die Anfrage
                type: 'POST', // HTTP-Methode
                data: JSON.stringify(object), // Daten als JSON-String
                contentType: 'application/json', // Inhaltstyp auf JSON setzen
                headers: this._getHeaders(), // Header abrufen
                success: function(response) {
                    console.log("POST-Antwort:", response); // Erfolgreiche Antwort protokollieren
                    resolve(response); // Antwort zurückgeben
                },
                error: function(jqXHR) {
                    console.error("POST-Fehler:", jqXHR); // Fehler protokollieren
                    this._handleForbidden(jqXHR.status); // Forbidden-Status behandeln
                    reject(jqXHR); // Fehler zurückgeben für mehr Kontext
                }.bind(this) // bind this to ensure it refers to the ApiRequest instance
            });
        });
    }

    /**
     * Sendet eine POST-Anfrage an den angegebenen Endpunkt mit Formulardaten, die aus dem bereitgestellten Objekt erstellt wurden.
     * @param {object} object - Das Objekt, das in FormData konvertiert werden soll.
     * @param {string} endpoint - Der API-Endpunkt, an den die Anfrage gesendet werden soll.
     * @return {Promise<object|false>} - Gibt ein Promise zurück, das auf die Antwort aufgelöst wird oder false im Fehlerfall.
     */
    postForm(object, endpoint = '') {
        return new Promise((resolve, reject) => {
            // FormData aus dem bereitgestellten Objekt erstellen
            const formData = new FormData();
            for (const key in object) {
                if (object.hasOwnProperty(key)) {
                    formData.append(key, object[key]); // Schlüssel-Wert-Paar zu FormData hinzufügen
                }
            }

            $.ajax({
                url: `${this.baseUrl}${endpoint}`, // Vollständige URL für die Anfrage
                type: 'POST', // HTTP-Methode
                data: formData, // FormData als Daten
                contentType: false, // Wichtig für FormData
                processData: false, // Wichtig für FormData
                headers: this._getHeaders(), // Header abrufen
                success: function(response) {
                    console.log("POST-Formularantwort:", response); // Erfolgreiche Antwort protokollieren
                    resolve(response); // Antwort zurückgeben
                },
                error: function(jqXHR) {
                    console.error("POST-Formularfehler:", jqXHR); // Fehler protokollieren
                    this._handleForbidden(jqXHR.status); // Forbidden-Status behandeln
                    reject(jqXHR); // Fehler zurückgeben für mehr Kontext
                }.bind(this) // bind this to ensure it refers to the ApiRequest instance
            });
        });
    }
}
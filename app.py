# app.py
from flask import Flask, render_template

app = Flask(__name__, template_folder='templates')

app = Flask(__name__)


@app.route("/test")
def home():
    return render_template("portfolio.html")

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8000, debug=True)

import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.metrics import accuracy_score

df = pd.read_csv("data/training.1600000.processed.noemoticon.csv", encoding='latin-1', header=None)
df = df[[0, 5]]
df.columns = ['label', 'tweet']
df['label'] = df['label'].apply(lambda x: 1 if x == 4 else 0)
X_train, X_test, y_train, y_test = train_test_split(df['tweet'], df['label'], test_size=0.2)
vectorizer = CountVectorizer(stop_words='english')
X_train_vec = vectorizer.fit_transform(X_train)
X_test_vec = vectorizer.transform(X_test)
model = MultinomialNB()
model.fit(X_train_vec, y_train)
y_pred = model.predict(X_test_vec)
print("Accuracy:", accuracy_score(y_test, y_pred))
tweet_input = input("Enter a tweet: ")
tweet_vec = vectorizer.transform([tweet_input])
pred = model.predict(tweet_vec)

if pred[0] == 1:
    print("Sentiment: Positive")
else:
    print("Sentiment: Negative")

import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import mean_squared_error
import numpy as np

df = pd.read_csv("student-mat.csv", sep=";")
le = LabelEncoder()
for col in df.columns:
    if df[col].dtype == 'object':
        df[col] = le.fit_transform(df[col])

X = df.drop(['G3'], axis=1)
y = df['G3']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)

model = RandomForestRegressor()
model.fit(X_train, y_train)

y_pred = model.predict(X_test)
print("MSE:", mean_squared_error(y_test, y_pred))

sample_input = {
    'school': 'GP',
    'sex': 'F',
    'age': 17,
    'address': 'U',
    'famsize': 'GT3',
    'Pstatus': 'A',
    'Medu': 4,
    'Fedu': 4,
    'Mjob': 'teacher',
    'Fjob': 'teacher',
    'reason': 'course',
    'guardian': 'mother',
    'traveltime': 1,
    'studytime': 2,
    'failures': 0,
    'schoolsup': 'yes',
    'famsup': 'no',
    'paid': 'no',
    'activities': 'yes',
    'nursery': 'yes',
    'higher': 'yes',
    'internet': 'yes',
    'romantic': 'no',
    'famrel': 4,
    'freetime': 3,
    'goout': 3,
    'Dalc': 1,
    'Walc': 1,
    'health': 5,
    'absences': 2,
    'G1': 15,
    'G2': 16
}

sample_df = pd.DataFrame([sample_input])
for col in sample_df.columns:
    if sample_df[col].dtype == 'object':
        sample_df[col] = le.fit(df[col]).transform(sample_df[col])

predicted_grade = model.predict(sample_df)
print("Predicted Final Grade (G3):", predicted_grade[0])

# -*- coding: utf-8 -*-
"""Learning_KKN.ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/13hgSCo1J6SB1N1DbD-E_1HeizCclpHt8
"""

import pandas as pd
import numpy as np
import pickle
import sys

from sklearn.feature_selection import SelectKBest
from sklearn.feature_selection import chi2
from sklearn.model_selection import train_test_split

from sklearn.neighbors import KNeighborsClassifier as KNN
from sklearn.naive_bayes import GaussianNB as NBC

from sklearn.metrics import accuracy_score
from sklearn.feature_selection import f_classif

df_weather = pd.read_csv("data/weatherAUS.csv")

df_weather_baru = df_weather

from sklearn import preprocessing
le = preprocessing.LabelEncoder()

str_cols = []
df_weather_baru = df_weather.iloc[:, 2:23]

for i, type in zip(np.arange(len(df_weather_baru.columns)), df_weather_baru.dtypes):
  if type == "O":
    str_cols.append(i)

for col in str_cols:
  df_weather_baru.iloc[:,col]= le.fit_transform(np.array(df_weather_baru.iloc[:,col].values.astype("str")).ravel())

df_weather_baru = df_weather_baru.fillna(df_weather_baru.median())

df_features_weather = df_weather_baru.iloc[:, 0:19]




"""TOMORROW"""

#jadikan Label
df_label_weather_tomorrow = df_weather_baru['RainTomorrow']

selectorTomorrow = SelectKBest(score_func = f_classif, k = 3)
selectorTomorrow.fit(df_features_weather, df_label_weather_tomorrow)

sel_features_Tomorrow = selectorTomorrow.get_support(indices = 3)
kolom_sel_features_Tomorrow = df_features_weather.iloc[:, sel_features_Tomorrow]

x_train_tomorrow, x_test_tomorrow, y_train_tomorrow, y_test_tomorrow = train_test_split(kolom_sel_features_Tomorrow, df_label_weather_tomorrow, test_size = 0.3, random_state = 1)

list_hasil_tomorrow = []
for i in range(3, 4):
 #MODEL
 KNN_MODEL_tomorrow  = KNN(n_neighbors=i)

 #TRAIN MODEL
 KNN_MODEL_tomorrow.fit(x_train_tomorrow, y_train_tomorrow)

 #PREDICT
 y_pred_tomorrow = KNN_MODEL_tomorrow.predict(x_test_tomorrow)

 #ACCURACY
 acc_tomorrow = accuracy_score(y_test_tomorrow, y_pred_tomorrow)
 list_hasil_tomorrow.append(acc_tomorrow)
#  print("ACC MODEL KNN tomorrow saat k = ", str(i), " : ", str(acc_tomorrow))

bestK_tomorrow = np.argmax(list_hasil_tomorrow)
# print("hasil K_tomorrow dengan ACC tertinggi = ", bestK_tomorrow + 3)
# print("akurasi_tomorrow = ", list_hasil_tomorrow[bestK_tomorrow])

best_model_KNN_tomorrow = KNN(n_neighbors= 50).fit(x_train_tomorrow, y_train_tomorrow)
pkl_filename_tomorrow = "KNN_50_tomorrow.pkl"
with open(pkl_filename_tomorrow, "wb") as file:
  pickle.dump(best_model_KNN_tomorrow, file)

#load
with open(pkl_filename_tomorrow, "rb") as file:
  loaded_model_KNN_tomorrow = pickle.load(file)


rainfall=int(sys.argv[1] )
sunshine=int(sys.argv[2] )
humidity9am=int(sys.argv[3] )
humidity3pm=int(sys.argv[4] )
cloud3pm=int(sys.argv[5] )


test_new_data_tomorrow = {'Sunshine':[sunshine], 'Humidity3pm':[humidity3pm], 'Cloud3pm':[cloud3pm]}
df_test_tomorrow = pd.DataFrame(test_new_data_tomorrow)

y_pred_new_KNN_tomorrow = loaded_model_KNN_tomorrow.predict(df_test_tomorrow)

hasilAkurasi = list_hasil_tomorrow[bestK_tomorrow] * 100

if(y_pred_new_KNN_tomorrow==0):
    print(hasilAkurasi, "% Not Raining")
else:
    print(hasilAkurasi,"% Raining")
#print(y_pred_new_KNN_tomorrow)
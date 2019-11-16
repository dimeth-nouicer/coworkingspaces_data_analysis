# Chap02-03/twitter_time_series.py
import sys
import json
from datetime import datetime
#import matplotlib.pyplot as plt
#import matplotlib.dates as mdates
import pandas as pd
import numpy as np
import pickle
import requests
#return requests.get(url).json()

if __name__ == '__main__':
 fname = sys.argv[1]
 with open(fname, 'r') as f:
    all_dates = []
    for line in f:
        tweet = json.loads(line)
        all_dates.append(tweet.get('created_at'))
    idx = pd.DatetimeIndex(all_dates)
    ones = np.ones(len(all_dates))

    # the actual series (at series of 1s for the moment)
    my_series = pd.Series(ones, index=idx)

    # Resampling / bucketing into 1-minute buckets
    per_minute = my_series.resample('1Min').sum().fillna(0)
 
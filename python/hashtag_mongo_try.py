# Chap02-03/twitter_hashtag_frequency.py
import sys, pymongo
from collections import Counter
import json
import pprint
def get_hashtags(tweet):
 entities = tweet.get('entities', {})
 hashtags = entities.get('hashtags', [])
 return [tag['text'].lower() for tag in hashtags]
 
if __name__ == '__main__':
 user = sys.argv[1]
 MongoClient = pymongo.MongoClient("mongodb://localhost")
 connexion=MongoClient.admin
 tweets_collection = "user_timeline_{}".format(user)
 #with open(fname, 'r') as f:
 n = connexion[tweets_collection].count()
 for tweet in connexion[tweets_collection].find(): #range(1, n):
    hashtags = Counter()
 #for line in f:
        #tweet = f.find_one() #json.loads(line)
    hashtags_in_tweet = get_hashtags(tweet)
    hashtags.update(hashtags_in_tweet)
    #print(hashtags)
    f = hashtags.most_common(2)
    #print(f)
    for tag, count in f:
        print("{}: {}".format(tag, count))
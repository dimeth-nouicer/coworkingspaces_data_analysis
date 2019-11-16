import os
import sys
from tweepy import API
from tweepy import OAuthHandler

def get_twitter_auth():
   
    #Setup Twitter authentication.
    #Return: tweepy.OAuthHandler object
 try:
    consumer_key = 'wFbadzTTk1xs0wgNP5XhmUbaq' #os.environ['TWITTER_CONSUMER_KEY']
    consumer_secret = 'FsuV0mCk9dbOSbXX55wUKKi4j7wMsY2wvoDYRclk7XtaYAR3pJ' #os.environ['TWITTER_CONSUMER_SECRET']
    access_token = '76611931-TgAStCyZ4TB8AiVubaY4n7n5r047G4iZHVpOMFsbj' #os.environ['TWITTER_ACCESS_TOKEN']
    access_secret = 'W5EfsXGofqXZprw3DHOol2QS10TB7usL9eD3sRQhgN8K7' #os.environ['TWITTER_ACCESS_TOKEN_SECRET']
 except KeyError:
    sys.stderr.write("TWITTER_* environment variables not set\n")
    sys.exit(1)
 auth = OAuthHandler(consumer_key, consumer_secret)
 auth.set_access_token(access_token, access_secret)
 return auth

def get_twitter_client():

 """Setup Twitter API client.Return: tweepy.API object"""
 auth = get_twitter_auth()
 client = API(auth)
 return client

########################################################
#get 10 tweets from timeline
from tweepy import Cursor
#from twitter_client import get_twitter_client
if __name__ == '__main__':
 client = get_twitter_client()
 for status in Cursor(client.home_timeline).items(10):
 # Process a single status
  print(status.text)

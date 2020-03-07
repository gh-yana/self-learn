def proc():

    import requests

    URL = 'https://slack.com/api/files.upload'
    TOKEN = 'xoxb-352006878416-693945350563-oFZONAbWBu6soyKPoqswKfIy'
    CHANNEL = '#testing'
    files = {'file':open('/home/pi/OpencvDnn/temp/image_box_text.jpg','rb')}

    param = {
       'token':TOKEN,
       'channels':CHANNEL,
       'filename':"filename",
       'initial_comment':"Image recognition every hour.(from OpenCV_DNN)",
       'title':"See the bounding box for detection results"
    }

    requests.post(url=URL,params=param, files=files)


using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;
using Newtonsoft.Json;

public class API : MonoBehaviour
{
    // public string URL = "http://127.0.0.1:8000/api/articles/1/";
    public string DataId = "1";
    public string URL = "http://127.0.0.1:8000/api/articles/";
    public TextMesh ResponseTitle;
    public Renderer ResponseImage;
    public TextMesh ResponseDescription;


    [System.Serializable]
    public class User
    {
        public int id;
        public string title;
        public string description;
        public string image_url;
        public object created_at;
        public object updated_at;
    }


    void Start() {
        StartCoroutine(GetText());
    }

    IEnumerator GetText()
    {
        using (UnityWebRequest www = UnityWebRequest.Get(URL + DataId))
        {
            yield return www.Send();

            if (www.isNetworkError || www.isHttpError)
            {
                Debug.Log(www.error);
            }
            else
            {

                // Debug.Log(www.downloadHandler.text);
                string json = www.downloadHandler.text;
                json = json.Trim('[').Trim(']');
                User user = JsonConvert.DeserializeObject<User>(json);
                string imgUrl = user.image_url.Replace(@"\\", "");
                // StartCoroutine(DownloadImage(user.image_url));
                StartCoroutine(DownloadImage(imgUrl));
                ResponseTitle.text = user.title;
                ResponseDescription.text = user.description;
            }
        }
    }

    IEnumerator DownloadImage(string MediaUrl)
    {   
        UnityWebRequest request = UnityWebRequestTexture.GetTexture(MediaUrl);
        yield return request.SendWebRequest();
        if(request.isNetworkError || request.isHttpError) 
            Debug.Log(request.error);
        else
            ResponseImage.material.mainTexture = ((DownloadHandlerTexture) request.downloadHandler).texture;
    } 
}
 